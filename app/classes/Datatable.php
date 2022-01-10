<?php

namespace App\Classes;

use App\Models\Order;

trait Datatable
{
    public function DataTableInOrders($request,$status)
    {
        	$totalData = Order::count();
			$TotalFiltered = $totalData;
			$limit = $request->length;
			$start = $request->start;

			if(empty($request->search->value)){

				$orders = Order::where('status',$status)
				->offset($start)
				->limit($limit)
				->orderBy('id','DESC')
				->get();

			}else{
				$search = $request->search->value;

				$orders = Order::orWhere('name','LIKE', "%{$search}%")
				->orWhere('order_date','LIKE', "%{$search}%")
				->orWhere('invoice_no','LIKE', "%{$search}%")
				->orWhere('amount','LIKE', "%{$search}%")
				->orWhere('payment_method','LIKE', "%{$search}%")
				->orWhere('status','LIKE', "%{$search}%")
				->where('status',$status)
				->offset($start)
				->limit($limit)
				->orderBy('id','DESC')
				->get();

				$TotalFiltered = Order::orWhere('name','LIKE', "%{$search}%")
				->orWhere('order_date','LIKE', "%{$search}%")
				->orWhere('invoice_no','LIKE', "%{$search}%")
				->orWhere('amount','LIKE', "%{$search}%")
				->orWhere('payment_method','LIKE', "%{$search}%")
				->orWhere('status','LIKE', "%{$search}%")
				->where('status',$status)
				->count();

			}
			$data = array();
			
			if(!empty($orders)){
				
				foreach($orders as $order)
				{
					if($order->status == 'cancel'){
						$button = '<span data-toggle="tooltip" data-placement="top" title="View Order Details"><a href="/admin/pending/details/'.$order->id.'"><button  type="button" class="btn-sm btn-success"><i class="fa fa-eye"></i></button></a></span>
						<span data-toggle="tooltip" data-placement="top" title="Delete orders"style="display:inline-block"> <form method="POST" action="/admin/delete/orders/'.$order->id.'" class="delete-item"> <input type="hidden" name="token" value="'. \App\Classes\CSRFToken::_token().'"> <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-trash"></i> </button> </form> </span>
						';
					}else if($order->status == 'pending'){
						$button = '<span data-toggle="tooltip" data-placement="top" title="View Order Details"><a href="/admin/pending/details/'.$order->id.'"><button  type="button" class="btn-sm btn-success"><i class="fa fa-eye"></i></button></a></span>
						<span data-toggle="tooltip" data-placement="top" title="cancel orders"style="display:inline-block"> <form method="POST" action="/admin/cancel/orders/'.$order->id.'" class="cancel-item"> <input type="hidden" name="token" value="'. \App\Classes\CSRFToken::_token().'"> <button type="submit" class="btn-sm btn-danger cancel" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-window-close"></i> </button> </form> </span>';
					}else{
						$button = '<span data-toggle="tooltip" data-placement="top" title="View Order Details"><a href="/admin/pending/details/'.$order->id.'"><button  type="button" class="btn-sm btn-success"><i class="fa fa-eye"></i></button></a></span>
						<span data-toggle="tooltip" data-placement="top" title="Download Pdf"><a href="/admin/pdf/downlaod/'.$order->id.'" target="_blank"><button  type="button" class="btn-sm btn-danger"><i class="fa fa-cloud-download"></i></button></a></span>
						';
					}
					
					$rawData['name'] = $order->name;
					$rawData['order_date'] = $order->order_date;
					$rawData['invoice_no'] = $order->invoice_no;
					$rawData['amount'] = $order->amount;
					$rawData['payment_method'] = $order->payment_method;
					$rawData['status'] = $order->status;
					$rawData['action'] = $button;

					$data[] = $rawData;

				}
				
			}
			
			$results = array(
				"draw" => intval($resquest->draw),
				"recordsTotal" => intval($totalData),
				"recordsFiltered" => intval($TotalFiltered),
				"data" => $data
			);
			
			echo json_encode($results);
			
    }
}