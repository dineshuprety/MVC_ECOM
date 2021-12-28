@extends('admin.layout.base')
@section('title', 'Edit Slider')
@section('data-page-id', 'adminEditSlider')
@section('content')
<div class="container-fluid">
@include('includes.message')
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <h4 class="mt-0 header-title">Edit {{ $slider->title }}</h4>
            <form action="/admin/slider/edit" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="exampleFormControlInput1">Slider Title:</label>
                  <input type="text" value="{{ $slider->title }}" name="title" class="form-control" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Button Link:</label>
                  <input type="url" name="url" value="{{ $slider->url }}" class="form-control" id="exampleFormControlInput1" >
               </div>
               <!-- form row 4 end -->
               <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" max="100" name="description" id="exampleFormControlTextarea1" rows="3">{{ $slider->description }}</textarea>
               </div>
               <div class="form-group">
               <label for="exampleFormControlFile1">Slider Image</label>
               <input type="file" name="sliderImage" class="form-control-file" id="exampleFormControlFile1">
               </div>
               <!-- button row -->
                <div class="form-row">
                <div class="col">
                <button type="reset" class="btn btn-danger">reset</button>
                </div>
                <div class="float-right">
                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </div>
                <!-- button row end -->
            </form>
         </div>
      </div>
   </div>
</div>

<!-- container -->
@endsection