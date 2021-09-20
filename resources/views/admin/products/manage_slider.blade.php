@extends('admin.layout.base')
@section('title', 'Product size')
@section('data-page-id', 'adminSizes')
@section('content')
<div class="container-fluid">
   @include('includes.message')
   <div class="row">
      <div class="col-xl-12">
         <div class="card m-b-30">
            <div class="card-body">
               <div class="table-responsive">
                  <h4 class="mt-0 header-title">Size Tables</h4>
                  <table class="table table-hover">
                     <thead>
                        <tr class="titles">
                           <th>Id</th>
                           <th>Title</th>
                           <th>URL</th>
                           <th>Image</th>
                           <th>Description</th>
                           <th>Created</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="c-table__cell">1</td>
                           <td class="c-table__cell">we are giving product 50% discount</td>
                           <td class="c-table__cell">https://shopyfiynepal.com.np</td>
                           <td class="c-table__cell"><img src="images\slider-image\sample-6.jpg" width="40%" height="50%" ></td>
                           <td class="c-table__cell">Wireless Charging Output: 5V/1A Lamp Arm Rotation Angle: 90 Degree</td>
                           <td class="c-table__cell">2056/45/2</td>
                           <td class="c-table__cell">
                              <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                              <i class="fa fa-trash"></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <hr>
                  <ul class="pagination justify-content-end">
                     <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- Page content Wrapper -->
   </div>
</div>
<!-- container -->
@include('includes.delete-model')
@endsection