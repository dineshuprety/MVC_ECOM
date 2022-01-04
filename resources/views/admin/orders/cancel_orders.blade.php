@extends('admin.layout.base')
@section('title', 'Cancel Orders')
@section('data-page-id', 'CancelOrders')
@section('content')
<div class="container-fluid">
   @include('includes.message')
   <div class="row">
      <div class="col-12">
         <div class="card m-b-30">
            <div class="card-body">
               <h4 class="mt-0 header-title">Cancel Orders</h4>
               <table id="cancel-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
