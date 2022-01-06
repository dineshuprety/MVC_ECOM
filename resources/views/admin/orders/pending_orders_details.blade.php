@extends('admin.layout.base')
@section('title', 'Pending Orders')
@section('data-page-id', 'PendingOrdersDetails')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-md-6 col-12">
      <div class="card m-b-30">
         <div class="card-body">
            <h4 class="mt-0 header-title">Shipping Details</h4>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th> Shipping Name : </th>
                     <th> {{ $order->name }} </th>
                  </tr>
                  <tr>
                     <th> Shipping Phone : </th>
                     <th> {{ $order->phone }} </th>
                  </tr>
                  <tr>
                     <th> Shipping Email : </th>
                     <th> {{ $order->email }} </th>
                  </tr>
                  <tr>
                     <th>Shipping City : </th>
                     <th> {{ $order->city }} </th>
                  </tr>
                  <tr>
                     <th>Shipping Address : </th>
                     <th> {{ $order->address }} </th>
                  </tr>
                  
                  <tr>
                     <th> State : </th>
                     <th>{{ $order->province}} </th>
                  </tr>
                  <tr>
                     <th> Post Code : </th>
                     <th> {{ $order->post_code }} </th>
                  </tr>
                  <tr>
                     <th> Order Date : </th>
                     <th> {{ $order->order_date }} </th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
   </div>
   <!-- orders details -->
   <div class="col-md-6 col-12">
      <div class="card m-b-30">
         <div class="card-body">
            <h4 class="mt-0 header-title"><strong>Order Details</strong> <span class="text-danger">  Invoice : {{ $order->invoice_no }}</span></h4>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>  Name : </th>
                     <th> {{ ucfirst($order->user->fullname) }} </th>
                  </tr>
                  <tr>
                     <th>  Phone : </th>
                     <th> {{ $order->user->phone_number }} </th>
                  </tr>
                  <tr>
                     <th> Payment Type : </th>
                     <th> {{ $order->payment_method }} </th>
                  </tr>
                  <tr>
                     <th> Tranx ID : </th>
                     <th> {{ $order->transaction_id }} </th>
                  </tr>
                  <tr>
                     <th> Invoice  : </th>
                     <th class="text-danger"> {{ $order->invoice_no }} </th>
                  </tr>
                  <tr>
                     <th> Order Total : </th>
                     <th>Rs {{ $order->amount }} </th>
                  </tr>
                  <tr>
                     <th> Order : </th>
                     <th>   
                        <span class="badge badge-warning">{{ $order->status }}</span> 
                     </th>
                  </tr>
                  <tr>
                     <th>  </th>
                     <th> 
                        @if($order->status == 'pending')
                        
                        <a href="/pending/confirm/{{$order->id}}" class="confirm"><button class="btn btn-block btn-success">Confirm Order</button></a>
                       
                        @elseif($order->status == 'confirm')
                        <a href="/confirm/processing/{{$order->id}}" id="processing"><button class="btn btn-block btn-success">Processing Order</button></a>
                        @elseif($order->status == 'processing')
                        <a href="/processing/picked/{{$order->id}}" id="picked"><button class="btn btn-block btn-success">Picked Order</button></a>
                        @elseif($order->status == 'picked')
                        <a href="/picked/shipped/{{$order->id}}" id="shipped"><button class="btn btn-block btn-success">Shipped Order</button></a>
                        @elseif($order->status == 'shipped')
                        <a href="/shipped/delivered/{{$order->id}}" id="delivered"><button class="btn btn-block btn-success">Delivered Order</button></a>
                        @endif
                     </th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
   </div>
   <!-- end orders details -->
   <div class="col-md-12 col-12">
      <div class="card m-b-30">
         <div class="card-body">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <td width="10%">
                        <label for=""> Image</label>
                     </td>
                     <td width="20%">
                        <label for=""> Product Name </label>
                     </td>
                     
                     <td width="10%">
                        <label for=""> Size </label>
                     </td>
                     <td width="10%">
                        <label for=""> Quantity </label>
                     </td>
                     <td width="10%">
                        <label for=""> Price </label>
                     </td>
                  </tr>
                  @foreach($orderItem as $item)
                  <tr>
                     <td width="10%">
                        <label for=""><img src="/{{$item->product->product_image_path}}" height="50px;" width="50px;"> </label>
                     </td>
                     <td width="20%">
                        <label for=""> {{ $item->product->title }}</label>
                     </td>
                     
                     <td width="10%">
                        <label for=""> {{ $item->size }}</label>
                     </td>
                     <td width="10%">
                        <label for=""> {{ $item->qty }}</label>
                     </td>
                     <td width="10%">
                        <label for=""> Rs {{ $item->price }}  ( Rs {{ $item->price * $item->qty}} ) </label>
                     </td>
                  </tr>
                  @endforeach
               </thead>
            </table>
         </div>
      </div>
   </div>

   <!-- end row -->
</div>
<!-- container -->
<!-- container -->
@include('includes.confirm-model')
@endsection
