@extends('admin.layout.base')
@section('title', 'Product Inventory')
@section('data-page-id', 'inventory')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <a href="/admin/product/create"> <button type="button" class="btn btn-success float-right"><i class="mdi mdi-plus"></i> Add Product</button></a>
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Inventory Items Table</h4>
               @if(count($products))
               <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" data-form="deleteForm">
                  <thead>
                     <tr class="titles">
                        <!-- <th>Id</th> -->
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Sales Price</th>
                        <th>Wholesell Price</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Qty</th>
                        <th>Create</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($products as $product)
                     <tr>
                        <td class="c-table__cell"><img src="/{{$product['product_image_path']}}" alt="{{$product['title']}}" width="40" height="40" ></td>
                        <td class="c-table__cell">{{substr($product['title'],0,10)}}...</td>
                        <td class="c-table__cell">Rs {{$product['price']}}</td>
                        <td class="c-table__cell">Rs {{$product['sales_price']}}</td>
                        <td class="c-table__cell">Rs {{$product['wholesell_price']}}</td>
                        <td class="c-table__cell">{{$product['category_name']}}</td>
                        <td class="c-table__cell">{{$product['sub_category_name']}}</td>
                        <td class="c-table__cell">{{ $quntity = \App\Models\Productattribute::where('product_id',$product['id'])->sum('quntity') }}</td>
                        <td class="c-table__cell">{{$product['added']}}</td>
                        <td class="c-table__cell">
                           <!-- Edit product button -->
                           <span data-toggle="tooltip" data-placement="top" title="Edit product">
                           <a href="/admin/product/{{$product['id']}}/edit" ><button type="button" class="btn-sm btn-success">
                           <i class="fa fa-edit"></i></button> </a>
                           </span>
                           <!-- deleted subcategory button -->
                           <span data-toggle="tooltip" data-placement="top" title style="display:inline-block" class="delete-item">
                              <form method="POST" action="{{$product['id']}}">
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
               <p> You have not created any products </p>
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
