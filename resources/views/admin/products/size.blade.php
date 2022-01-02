@extends('admin.layout.base')
@section('title', 'Product size')
@section('data-page-id', 'adminCategories')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <div class="col">
               <div class="col-xl-4 float-left">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                     <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="button-addon2">Search</button>
                     </div>
                  </div>
               </div>
               <form action="/admin/product/size" method="post">
                  <div class="col-xl-4 float-right">
                     <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Add Size">
                        <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <div class="input-group-append">
                           <input type="submit" class="btn btn-success" value="Add" id="button-addon2">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Size Tables</h4>
               @if(count($sizes))
               <table class="table table-striped table-bordered" cellspacing="0" width="100%" data-form="deleteForm">
                  <thead>
                     <tr class="titles">
                        <!-- <th>Id</th> -->
                        <th>Name</th>
                        <th>Created</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($sizes as $size)
                     <tr>
                        <td class="c-table__cell">{{ $size['name'] }}</td>
                        <td class="c-table__cell">{{ $size['added'] }}</td>
                        <td class="c-table__cell">
                           <!-- deleted size button -->
                           <span data-toggle="tooltip" data-placement="top" title="Delete size"style="display:inline-block"  class="delete-item">
                              <form  action="/admin/product/size/{{$size['id']}}/delete" method="POST">
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
               <p> You have not created any size </p>
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
