@extends('admin.layout.base')
@section('title', 'Processing Orders')
@section('data-page-id', 'ProcessingOrders')
@section('content')
<div class="container-fluid">
   @include('includes.message')
   <div class="row">
      <div class="col-12">
         <div class="card m-b-30">
            <div class="card-body">
               <h4 class="mt-0 header-title">Processing Orders</h4>
               <table id="processing-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>Name </th>
                        <th>Date </th>
                        <th>Invoice </th>
                        <th>Amount </th>
                        <th>Payment </th>
                        <th>Status </th>
                        <th>Action </th>
                     </tr>
                  </thead>
                  
                  <tbody>

                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- end col -->
   </div>
   <!-- end row -->
</div>
<!-- container -->
<!-- container -->
@endsection
