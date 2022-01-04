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
					// $data[] = $order;
					$rawData['name'] = $order->name;
					$rawData['order_date'] = $order->order_date;
					$rawData['invoice_no'] = $order->invoice_no;
					$rawData['amount'] = $order->amount;
					$rawData['payment_method'] = $order->payment_method;
					$rawData['status'] = $order->status;
					$rawData['action'] = '<span data-toggle="tooltip" data-placement="top" title="View Order Details"><a href="/admin/pending/details/'.$order->id.'"><button  type="button" class="btn-sm btn-success"><i class="fa fa-eye"></i></button></a></span>
					<span data-toggle="tooltip" data-placement="top" title="Cancel Order"><a href="/admin/cancel/orders/'.$order->id.'"><button  type="button" class="btn-sm btn-danger"><i class="fa fa-times"></i></button></a></span>
					';

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