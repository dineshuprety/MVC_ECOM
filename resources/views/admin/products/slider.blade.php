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
            <h4 class="mt-0 header-title">Add Slider</h4>
            <form>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Slider Title:</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Slider title">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Button Link:</label>
                  <input type="url" class="form-control" id="exampleFormControlInput1" placeholder="Url">
               </div>
               <!-- form row 4 end -->
               <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
               </div>
               <div class="form-group">
               <label for="exampleFormControlFile1">Slider Image</label>
               <input type="file" class="form-control-file" id="exampleFormControlFile1">
               </div>
               <!-- button row -->
                <div class="form-row">
                <div class="col">
                <button type="reset" class="btn btn-danger" type="submit">Reset</button>
                </div>
                <div class="float-right">
                <button class="btn btn-primary" type="submit">Upload</button>
                </div>
                </div>
                <!-- button row end -->
         </div>
      </div>
   </div>
</div>

<!-- container -->
@include('includes.delete-model')
@endsection