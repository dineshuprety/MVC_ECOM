<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Datatable;
use App\Classes\Role;
use App\Classes\Mail;
use App\Models\Order;
use App\Models\OrderItem;

use Carbon\Carbon;
use Dompdf\Dompdf;

class OrderController extends BaseController
{
    use Datatable;
	
	public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }

	// Pending Orders view page
    public function showPendingOrders()
    {
        return view('admin.orders.pending_orders');
    }

	// Confirm Orders view Page
	public function showConfirmOrders()
    {
        return view('admin.orders.confirmed_orders');
    }

	// Processing Orders 
	public function ShowProcessingOrders(){
		return view('admin.orders.processing_orders');

	} // end mehtod
	
	public function ShowPickedOrders(){
		return view('admin.orders.picked_orders');
	} // end mehtod 

	public function ShowShippedOrders(){

	 return view('admin.orders.shipped_orders');

	} // end mehtod

	public function ShowDeliveredOrders(){	
		return view('admin.orders.delivered_orders');
	} // end mehtod 

	public function ShowCancelOrders(){
		return view('admin.orders.cancel_orders');
	} // end mehtod 

	public function PendingOrders(){

		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'pending');
			exit;
		}
		
	} // end mehtod 

	// Pending Order Details 
	public function PendingOrdersDetails($id){

		$order = Order::with('user')->where('id',$id)->get()->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
    	return view('admin.orders.pending_orders_details',compact('order','orderItem'));
		die();

	} // end method 

	// Confirmed Orders 
	public function ConfirmedOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'confirm');
			exit;
		}

	} // end mehtod 

	// Processing Orders 
	public function ProcessingOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'processing');
			exit;
		}

	} // end mehtod 


		// Picked Orders 
	public function PickedOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'picked');
			exit;
		}

	} // end mehtod 

	// Shipped Orders 
	public function ShippedOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'shipped');
			exit;
		}

	} // end mehtod 

	// Delivered Orders 
	public function DeliveredOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'delivered');
			exit;
		}

	} // end mehtod 

    // Cancel Orders 
	public function CancelOrders(){
		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'cancel');
			exit;
		}

	} // end mehtod 

	// pending to confirm order
	public function PendingToConfirm($id){
		$result = array();
		$orders = Order::where('id', $id)->first();
		if(Order::where('id', $id)->first()->update([
			'status' => 'confirm',
			'confirmed_date' => Carbon::now()
		]))
		{
			$result['name'] = ucfirst($orders->name);
			$result['message'] = ucfirst('Your Order Has been Confirmed, Thank you ShopifyNepal');
			$data = [
				'to' => $orders->email,
				'subject' => 'Your Order Has been Confirmed',
				'view' => 'orderTrack',
				'name' => ucfirst($orders->name),
				'body' => $result
			];
			(new Mail())->send($data);
			Session::add('success', 'Order change to confirm');
			return Redirect::to('/admin/pending/orders');
			die();
		}
		
	} // end method

	public function ConfirmToProcessing($id){
		$result = array();
		$orders = Order::where('id', $id)->first();

		if(Order::where('id', $id)->first()->update([
			'status' => 'processing',
			'processing_date' => Carbon::now()
		])){

			$result['name'] = ucfirst($orders->name);
			$result['message'] = ucfirst('Your Order Has been in Processing, Thank you ShopifyNepal');
			$data = [
				'to' => $orders->email,
				'subject' => 'Your Order Has been Processing',
				'view' => 'orderTrack',
				'name' => ucfirst($orders->name),
				'body' => $result
			];
			(new Mail())->send($data);
			Session::add('success', 'Order change to Processing');
			return Redirect::to('/admin/confirm/orders');
			die();
		}
		

	} // end method

	public function ProcessingToPicked($id){

			$result = array();
			$orders = Order::where('id', $id)->first();
   
			if(Order::where('id', $id)->first()->update([
				'status' => 'picked',
				'picked_date' => Carbon::now()
			]))
			{
				$result['name'] = ucfirst($orders->name);
				$result['message'] = ucfirst('Your Order Has been in Picked, Thank you ShopifyNepal');
				$data = [
					'to' => $orders->email,
					'subject' => 'Your Order Has been Picked',
					'view' => 'orderTrack',
					'name' => ucfirst($orders->name),
					'body' => $result
				];
				(new Mail())->send($data);
				Session::add('success', 'Order change to Picked');
				return Redirect::to('/admin/processing/orders');
				die();

			}

	} // end method

	 public function PickedToShipped($id){
		$result = array();
		$orders = Order::where('id', $id)->first();
   
		if(Order::where('id', $id)->first()->update([
			'status' => 'shipped',
			'shipped_date' => Carbon::now()
		]))
		{
				$result['name'] = ucfirst($orders->name);
				$result['message'] = ucfirst('Your Order Has been in Picked, Thank you ShopifyNepal');
				$data = [
					'to' => $orders->email,
					'subject' => 'Your Order Has been Picked',
					'view' => 'orderTrack',
					'name' => ucfirst($orders->name),
					'body' => $result
				];
				(new Mail())->send($data);
				Session::add('success', 'Order change to Shipped');
				return Redirect::to('/admin/picked/orders');
				die();
		}
		


	} // end method

	public function ShippedToDelivered($order_id){

	 $product = OrderItem::where('order_id',$order_id)->get();
	 foreach ($product as $item) {
	 	Product::where('id',$item->product_id)
	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	 } 
 
      Order::findOrFail($order_id)->update(['status' => 'delivered']);

      $notification = array(
			'message' => 'Order Delivered Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('shipped-orders')->with($notification);


	} // end method

	public function Cancel($id){
		if(Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::verifyCSRFToken($request->token)){
				$result = array();
				$orders = Order::where('id', $id)->first();
		
				if(Order::where('id', $id)->first()->update([
					'status' => 'cancel',
					'cancel_date' => Carbon::now()
				]))
					{
						$result['name'] = ucfirst($orders->name);
						$result['message'] = ucfirst('We are unable to deliver your item <br>Your item has been cancel');
						$data = [
							'to' => $orders->email,
							'subject' => 'Your Order Has been Cancel',
							'view' => 'orderTrack',
							'name' => ucfirst($orders->name),
							'body' => $result
						];
						(new Mail())->send($data);
						Session::add('success', 'Order change to cancel');
						Redirect::to('/admin/cancel/orders');
						die();
					}
			}
			Redirect::to('/admin/cancel/orders');
		}
		return null;

	} // end method

	public function DeleteCancelOrder($id)
	{
		if(Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::verifyCSRFToken($request->token)){
				Order::destroy($id);
						
				$product = OrderItem::where('order_id',$id)->get();
				if(count($product)){
					foreach ($product as $item) {
						$item->delete();
					}
				}
				Session::add('success', 'Order Deleted');
				Redirect::to('/admin/cancel/orders');
				die();
			}
			Redirect::to('/admin/cancel/orders');
		}
		return null;
	}

	public function InvoiceDownload($id){
		$order = Order::with('user')->where('id',$id)->get()->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

		$pdf = new Dompdf();
		$rander = render();
		exit();

 
	 } // end mehtod 
	
}


