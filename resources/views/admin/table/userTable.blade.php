@extends('admin.layout.base')
@section('title', 'Retailer Users')
@section('data-page-id', 'users')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Retailer Users Table</h4>
               @if(count($retailerUsers))
               <table class="table table-hover" data-form="deletedProduct">
                  <thead>
                     <tr class="titles">
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Created At</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($retailerUsers as $user)
                     <tr>
                        <td class="c-table__cell">{{$user['fullname']}}</td>
                        <td class="c-table__cell">{{$user['phone_number']}}</td>
                        <td class="c-table__cell">{{$user['email']}}</td>
                        <td class="c-table__cell">{{$user['added']}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <!-- table end -->
               <!-- pagination start -->
               <hr>
               <ul class="pagination justify-content-end">
                  {!! $links !!}
               </ul>
               @else
               <p> You do not have any users</p>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!-- Page content Wrapper -->
</div>
<!-- container -->
@include('includes.delete-model')
@endsection
