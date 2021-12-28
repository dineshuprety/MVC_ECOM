@extends('admin.layout.base')
@section('title', 'Manage Slider')
@section('data-page-id', 'adminSliderManage')
@section('content')
<div class="container-fluid">
   @include('includes.message')
   <div class="row">
      <div class="col-xl-12">
         <div class="card m-b-30">
            <div class="card-body">
               <div class="table-responsive-sm">
                  <h4 class="mt-0 header-title">Slider Tables</h4>
                  @if(count($sliders))
                  <table class="table table-hover" data-form="deleteForm">
                     <thead>
                        <tr class="titles">
                           <th>Title</th>
                           <th>URL</th>
                           <th>Image</th>
                           <th>Description</th>
                           <th>Created</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                           <td class="col-sm-1">{{substr($slider['title'], 0, 10) }}</td>
                           <td class="col-sm-1">{{substr($slider['url'],8, 26) }}</td>
                           <td class="col-sm-2"><img src="/{{ $slider['image_path'] }}" alt="{{ $slider['title'] }}" width="40" height="40" ></td>
                           <td class="col-sm-1">{{ substr($slider['description'],0,20 )}}</td>
                           <td class="col-sm-1">{{ $slider['added'] }}</td>
                           <td class="col-sm-1">
                              <!-- Edit Slider button -->
                              <span data-toggle="tooltip" data-placement="top" title="Edit Sliders">
                              <a href="/admin/slider/{{$slider['id']}}/edit" class="btn-sm btn-success">
                              <i class="fa fa-edit"></i></a>
                              </span>
                              <span data-toggle="tooltip" data-placement="top" title="Delete slider"  class="delete-item" style="display:inline-block">
                                 <form method="POST" action="/admin/slider/{{$slider['id']}}/delete">
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
                  <ul class="pagination justify-content-end">
                     {!! $links !!}
                  </ul>
                  @else
                  <h3> You have not created any Slider</h3>
                  @endif
                  <hr>
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
