<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Datatable;
use App\Classes\Role;
use App\Models\Order;




class OrderController extends BaseController
{
    use Datatable;


	// Pending Orders 
    public function showPendingOrders()
    {
        return view('admin.orders.pending_orders');
    }

	public function PendingOrders(){

		if(Request::has('post')){
            $request = Request::get('post');
			$this->DataTableInOrders($request,'pending');
			exit;
		}
		

	} // end mehtod 


	// Pending Order Details 
	public function PendingOrdersDetails($id){

		$order = Order::with('division','district','state','user')->where('id',$id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
    	return view('admin.orders.pending_orders_details',compact('order','orderItem'));

	} // end method 



	// Confirmed Orders 
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('admin.orders.confirmed_orders',compact('orders'));

	} // end mehtod 


	// Processing Orders 
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('admin.orders.processing_orders',compact('orders'));

	} // end mehtod 


		// Picked Orders 
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('admin.orders.picked_orders',compact('orders'));

	} // end mehtod 



			// Shipped Orders 
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('admin.orders.shipped_orders',compact('orders'));

	} // end mehtod 


			// Delivered Orders 
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('admin.orders.delivered_orders',compact('orders'));

	} // end mehtod 


				// Cancel Orders 
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('admin.orders.cancel_orders',compact('orders'));

	} // end mehtod 




	public function PendingToConfirm($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'confirm']);

      $notification = array(
			'message' => 'Order Confirm Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);


	} // end method





	public function ConfirmToProcessing($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'processing']);

      $notification = array(
			'message' => 'Order Processing Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);


	} // end method



		public function ProcessingToPicked($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'picked']);

      $notification = array(
			'message' => 'Order Picked Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('processing-orders')->with($notification);


	} // end method


	 public function PickedToShipped($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'shipped']);

      $notification = array(
			'message' => 'Order Shipped Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('picked-orders')->with($notification);


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


	
}


