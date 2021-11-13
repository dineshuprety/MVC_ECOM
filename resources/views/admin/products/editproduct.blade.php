@extends('admin.layout.base')
@section('title', 'Edit Product')
@section('data-page-id', 'adminProduct')
@section('content')
<div class="container-fluid">
@include('includes.message')
<form action="/admin/product/create" method="post" enctype="multipart/form-data">
<div class="row">
   <div class="col-xl-12">
      <div class="card m-b-30">
         <div class="card-body">
            <h4 class="mt-0 header-title">Edit {{ucfirst($result['title'])}}</h4>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Product Title:</label>
                  <input type="text" name="title" class="form-control" value=""  placeholder="product title" >
               </div>
               <!-- form row 1 -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Retailer Price(RS):</label>
                        <input type="text" name="price" class="form-control" placeholder="Retailer(RS)"   >
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Wholesaler Price(RS):</label>
                        <input type="text" class="form-control" name="wholesell_price" placeholder="wholesaler(RS)">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Sales Price(RS):</label>
                        <input type="text" name="sales_price" class="form-control" placeholder="On sales(RS)">
                     </div>
                  </div>
               </div>
               <!-- form row 1 end -->
               <!-- form row 2 -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label>
                        <select class="form-control" name="category_id" id="product-category" >
                           
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                 @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="product-subcategory" >
                        
                        </select>
                     </div>
                  </div>
               </div>
               <!-- form row 2 end -->
               <!-- form row 3 -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Product On:</label>
                        <select class="form-control" name="product_on" id="exampleFormControlSelect1" >
                           <option value="selected" selected disabled>Choose a Product On</option>
                           <option value="1">hot sales</option>
                           <option value="2">feacher</option>
                        </select>
                     </div>
                  </div>
               </div>
               <!-- form row 3 end -->
               <!-- form image row -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Main Image</label>
                        <input type="file" name="product_image_path" class="form-control-file" id="exampleFormControlFile1" >
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Hover Image</label>
                        <input type="file" name="hover_image_path" class="form-control-file" id="exampleFormControlFile1" >
                     </div>
                  </div>
               </div>
               <!-- form image row end -->
               <!-- form row 4 end -->
               <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  
                  <textarea class="form-control" name="description" rows="3" placeholder="write a description" ></textarea>
               </div>
         </div>
      </div>
   </div>
</div>
<!-- product attributs -->
         <div class="col-xl-12" >
         <div class="card m-b-30">
         <div class="card-body">
         <h4 class="mt-0 header-title">Add Attributes</h4>
         <div id="product_attr_box">
               @php 
               $loop_count_num=1;
               @endphp
               @foreach($result['productAttrArr'] as $key=>$val)
               @php 
               $loop_count_prev=$loop_count_num;
               $pAArr=$val;
               @endphp
         <div class="form-row">
         <div class="col">
         <div class="form-group">
         <label for="exampleFormControlInput1">SKU:</label>
         <input type="text" name="sku[]" class="form-control" value="{{$pAArr['sku']}}" placeholder="SKU" >
         </div>
         </div>
         <div class="col">
         <div class="form-group">
         <label for="exampleFormControlInput1">Qty:</label>
         <input type="text" name="quntity[]"  class="form-control" placeholder="Qty" >
         </div>
         </div>
         <div class="col">
         <div class="form-group">
         <label for="size_id">Size</label>
         <select name=size_id[] class="form-control" id="size_id" >
         <option value="selected" selected disabled>Choose a Size</option>
             @foreach($sizes as $size)
                  <option value="{{$size->id}}">{{ucfirst($size->name)}}</option>
             @endforeach
         </select>   
         </div>
         </div>
         </div>
         <div class="form-row">
         <div class="col">
         <div class="float-right">
         <button class="btn btn-primary" onclick="add_more()" type="button"><i class="fa fa-plus"></i> Add</button>
         </div>
         </div>
         </div>
         @endforeach
         <hr><br>
</div>
         <!-- button row -->
         <div class="form-row">
         <div class="col">
         <button type="reset" class="btn btn-danger">Reset</button>
         </div>
         <div class="float-right">
         <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
         <button class="btn btn-primary" type="submit">Upload</button>
         </div>
         </div>
         <!-- button row end -->
         </div>
         </div>
</form>
</div>
<!-- container -->
@include('includes.delete-model')
<script>
   var loop_count = 1;
   function add_more(){
       loop_count++;
       var html='<div id="product_attr_'+loop_count+'"><div class="form-row"><div class="col"> <div class="form-group"> <label for="exampleFormControlInput1">SKU:</label> <input type="text" name="sku[]" class="form-control" placeholder="SKU" > </div> </div> <div class="col"> <div class="form-group"> <label for="exampleFormControlInput1">Qty:</label> <input type="text" name="quntity[]" class="form-control" placeholder="Qty" > </div> </div> ';
       var size_id_html=jQuery('#size_id').html(); 
      html+='<div class="col"> <div class="form-group"> <label for="size_id">Size</label> <select name="size_id[]" class="form-control" id="size_id" >'+size_id_html+'</select></div> </div> </div>';
   
      html+='<div class="form-row"> <div class="col"> <div class="float-right"> <button class="btn btn-danger" onclick="remove_more('+loop_count+')" type="button"><i class="fa fa-minus"></i> Remove</button> </div> </div> </div><hr><br></div>';
   
      jQuery('#product_attr_box').append(html)
   }
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }
</script>
@endsection