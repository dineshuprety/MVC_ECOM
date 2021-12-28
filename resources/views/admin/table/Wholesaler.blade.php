@extends('admin.layout.base')
@section('title', 'Wholesaler Users')
@section('data-page-id', 'wholesalerusers')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Wholesaler Users Table</h4>
               @if(count($WholesaleUsers))
               <table class="table table-hover" data-form="deleteForm">
                  <thead>
                     <tr class="titles">
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Pan Number</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($WholesaleUsers as $user)
                     <tr>
                       
                        <td class="c-table__cell">
                           <div class="user-wrapper">
                              <div class="img-user">
                                 <img src="/{{$user['pan_image']}}" width="50" height="50" alt="user" class="rounded-circle">
                              </div>
                              <div class="text-user">
                                 <h6>{{$user['fullname']}}</h6>
                                 <p>{{$user['username']}}</p>
                              </div>
                           </div>
                           <div id="image-viewer">
                              <span class="close">&times;</span>
                              <img class="modal-content" id="full-image">
                           </div>
                        </td>
                        <td class="c-table__cell">{{$user['phone_number']}}</td>
                        <td class="c-table__cell">{{$user['email']}}</td>
                        <td class="c-table__cell">{{$user['pan_number']}}</td>
                        @if($user['status'] == 0)
                        <td class="c-table__cell">
                           <span class="badge badge-warning"> Pending </span>
                        </td>
                        @else
                        <td class="c-table__cell">
                           <span class="badge badge-info"> Aproved </span>
                        </td>
                        @endif
                        <td class="c-table__cell">{{$user['added']}}</td>
                        <td class="c-table__cell">
                        @if($user['status'] == 0)
                        <span data-toggle="tooltip" data-placement="top" title="Aprove the user" style="display:inline-block">
                        <a href="/admin/users/wholesalers/{{$user['id']}}/updateStatus" ><button type="button" class="btn-sm btn-success">
                           <i class="fa fa-arrow-up"></i></button> </a>
                           </span>
                           @endif
                           <!-- deleted -->
                           <span data-toggle="tooltip" data-placement="top" title="Delete Category"style="display:inline-block" class="delete-item">
                              <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete">
                                 <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                 <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                 <i class="fa fa-trash"></i></button>
                                 </from>
                           </span>
                        </td>
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
               <p> You do not have any Wholesaler users</p>
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
