@extends('admin.layout.base')
@section('title', 'Product Categories')
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
               <form action="/admin/product/categories" method="post">
                  <div class="col-xl-4 float-right">
                     <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Add Category">
                        <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <div class="input-group-append">
                           <input type="submit" class="btn btn-success" value="Add" id="button-addon2">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Category Tables</h4>
               @if(count($categories))
               <table class="table table-striped table-bordered" cellspacing="0" width="100%" data-form="deleteForm">
                  <thead>
                     <tr class="titles">
                        <!-- <th>Id</th> -->
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($categories as $category)
                     <tr>
                        <td class="c-table__cell">{{ $category['name'] }}</td>
                        <td class="c-table__cell">{{ $category['slug'] }}</td>
                        <td class="c-table__cell">{{ $category['added'] }}</td>
                        <td class="c-table__cell">
                           <!-- add sub category button -->
                           <span data-toggle="tooltip" data-placement="top" title="Add SubCategory">
                           <button type="button"  class="btn-sm btn-primary" data-toggle="modal" data-target="#add-subcategory-{{$category['id']}}">
                           <i class="mdi mdi-plus"></i></button>
                           </span>
                           <!-- Edit category button -->
                           <span data-toggle="tooltip" data-placement="top" title="Edit Category">
                           <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModal-{{$category['id']}}">
                           <i class="fa fa-edit"></i></button>
                           </span>
                           <!-- deleted category button -->
                           <span data-toggle="tooltip" data-placement="top" title="Delete Category"style="display:inline-block">
                              <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
                                 <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                 <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                 <i class="fa fa-trash"></i></button>
                                 </from>
                           </span>
                        </td>
                     </tr>
                     <!-- Modal category -->
                     <div class="modal fade" id="exampleModal-{{$category['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                     <div class="modal-dialog ">
                     <div class="modal-content">
                     <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                     <a href="/admin/product/categories" class="close">
                     <span aria-hidden="true">&times;</span>
                     </a>
                     </div>
                     <div class="modal-body">
                     <div class="notification alert alert-success"></div>
                     <form>
                     <div class="form-group">
                     <input type="text" id="item-name-{{$category['id']}}" name="name"  value="{{$category['name']}}"class="form-control">
                     <small id="emailHelp" class="form-text text-muted">Here edit category for your product.</small>
                     </div>
                     </form>
                     </div>
                     <div class="modal-footer">
                     <input type="submit" value="update" data-token="{{ \App\Classes\CSRFToken::_token() }}" class="btn btn-success update-category" id="{{$category['id']}}">
                     </div>
                     </div>
                     </div>
                     </div>
                     <!-- end of category -->
                     <!-- add sub category -->
                     <div class="modal fade" id="add-subcategory-{{$category['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog ">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add SubCategory</h5>
                                 <a href="/admin/product/categories" class="close">
                                 <span aria-hidden="true">&times;</span>
                                 </a>
                              </div>
                              <div class="modal-body">
                                 <div class="notification alert"></div>
                                 <form>
                                    <div class="form-group">
                                       <input type="text" id="subcategory-name-{{$category['id']}}"class="form-control">
                                       <small id="emailHelp" class="form-text text-muted">Here Add Subcategory for your product.</small>
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <input type="submit" value="create" data-token="{{ \App\Classes\CSRFToken::_token() }}" class="btn btn-success add-subcategorybtn" id="{{$category['id']}}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end of subcategory -->
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
               <p> You have not created any categories </p>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!-- Page content Wrapper -->
</div>
<!-- sub category table -->
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <div class="table-responsive">
               <h4 class="mt-0 header-title">Sub Category Tables</h4>
               @if(count($subcategories))
               <table class="table table-striped table-bordered" cellspacing="0" width="100%" data-form="deleteForm">
                  <thead>
                     <tr class="titles">
                        <!-- <th>Id</th> -->
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($subcategories as $subcategory)
                     <tr>
                        <td class="c-table__cell">{{ $subcategory['name'] }}</td>
                        <td class="c-table__cell">{{ $subcategory['slug'] }}</td>
                        <td class="c-table__cell">{{ $subcategory['added'] }}</td>
                        <td class="c-table__cell">
                           <!-- Edit category button -->
                           <span data-toggle="tooltip" data-placement="top" title="Edit SubCategory">
                           <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#item-subcategory-{{$subcategory['id']}}">
                           <i class="fa fa-edit"></i></button>
                           </span>
                           <!-- deleted subcategory button -->
                           <span data-toggle="tooltip" data-placement="top" title="Delete SubCategory"style="display:inline-block">
                              <form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
                                 <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                 <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                 <i class="fa fa-trash"></i></button>
                                 </from>
                           </span>
                        </td>
                     </tr>
                     <!-- Modal edit subcategory -->
                     <div class="modal fade" id="item-subcategory-{{$subcategory['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                     <div class="modal-dialog ">
                     <div class="modal-content">
                     <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory</h5>
                     <a href="/admin/product/categories" class="close">
                     <span aria-hidden="true">&times;</span>
                     </a>
                     </div>
                     <div class="modal-body">
                     <div class="notification alert alert-success"></div>
                     <form>
                     <div class="form-group">
                     <input type="text" id="item-subcategory-name-{{$subcategory['id']}}"
                        value="{{ $subcategory['name'] }}"class="form-control">
                     <div class="form-group">
                     <small id="emailHelp" class="form-text text-muted">Here edit category for your product.</small>
                     <select class="form-control"id="item-category-{{ $subcategory['category_id']}}">
                     @foreach(\App\Models\Category::all() as $category)
                     @if($category->id == $subcategory['category_id'])
                     <option selected="selected" value="{{$category->id}}">
                     {{$category->name}}
                     </option>
                     @endif
                     <option  value="{{$category->id}}">
                     {{$category->name}}
                     </option>
                     @endforeach
                     </select>
                     </div>
                     </div>
                     </form>
                     </div>
                     <div class="modal-footer">
                     <input type="submit" id="{{$subcategory['id']}}" value="update" data-category-id="{{$subcategory['category_id']}}"  data-token="{{ \App\Classes\CSRFToken::_token() }}" class="btn btn-success update-subcategory">
                     </div>
                     </div>
                     </div>
                     </div>
                     <!-- end of category -->
                     @endforeach
                  </tbody>
               </table>
               <!-- table end -->
               <!-- pagination start -->
               <hr>
               <ul class="pagination justify-content-end">
                  {!! $subcategories_links !!}
               </ul>
               @else
               <p> You have not created any Subcategories </p>
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End sub category table -->
<!-- container -->
@include('includes.delete-model')
@endsection
