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
            <h4 class="mt-0 header-title">Add Product</h4>
            <form>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Product Title:</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="product title">
               </div>
               <!-- form row 1 -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Retailer Price(RS):</label>
                        <input type="text" class="form-control" placeholder="Retailer(RS)">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Wholesaler Price(RS):</label>
                        <input type="text" class="form-control" placeholder="wholesaler(RS)">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Sales Price(RS):</label>
                        <input type="text" class="form-control" placeholder="On sales(RS)">
                     </div>
                  </div>
               </div>
               <!-- form row 1 end -->
               <!-- form row 2 -->
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                           <option value="selected" selected disabled>Choose a Catagory</option>
                           <option>Men Items</option>
                           <option>Women Items</option>
                           <option>Cosmatic</option>
                           <option>Laptop</option>
                           <option>Mobile</option>
                        </select>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Sub Category</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                           <option value="selected" selected disabled>Choose a Sub Catagory</option>
                           <option>Men Items</option>
                           <option>Women Items</option>
                           <option>Cosmatic</option>
                           <option>Laptop</option>
                           <option>Mobile</option>
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
                        <select class="form-control" id="exampleFormControlSelect1">
                           <option value="selected" selected disabled>Choose a Product On</option>
                           <option>hot sales</option>
                           <option>feacher</option>
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
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Hover Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                     </div>
                  </div>
               </div>
               <!-- form image row end -->
               <!-- form row 4 end -->
               <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
<div class="form-row">
<div class="col">
<div class="form-group">
<label for="exampleFormControlInput1">SKU:</label>
<input type="text" class="form-control" placeholder="SKU">
</div>
</div>
<div class="col">
<div class="form-group">
<label for="exampleFormControlInput1">Qty:</label>
<input type="text" class="form-control" placeholder="Qty">
</div>
</div>
<div class="col">
<div class="form-group">
<label for="size_id">Size</label>
<select class="form-control" id="size_id">
<option value="selected" selected disabled>Choose a Size</option>
<option>xl</option>
<option>Xxl</option>
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
<hr><br>
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
</form>
</div>
</div>
</div>
<!-- container -->
@include('includes.delete-model')
<script>
   var loop_count = 1;
   function add_more(){
       loop_count++;
       var html='<div id="product_attr_'+loop_count+'"><div class="form-row"><div class="col"> <div class="form-group"> <label for="exampleFormControlInput1">SKU:</label> <input type="text" class="form-control" placeholder="SKU"> </div> </div> <div class="col"> <div class="form-group"> <label for="exampleFormControlInput1">Qty:</label> <input type="text" class="form-control" placeholder="Qty"> </div> </div> ';
       var size_id_html=jQuery('#size_id').html(); 
      html+='<div class="col"> <div class="form-group"> <label for="size_id">Size</label> <select class="form-control" id="size_id">'+size_id_html+'</select></div> </div> </div>';
   
      html+='<div class="form-row"> <div class="col"> <div class="float-right"> <button class="btn btn-danger" onclick="remove_more('+loop_count+')" type="button"><i class="fa fa-minus"></i> Remove</button> </div> </div> </div><hr><br></div>';
   
      jQuery('#product_attr_box').append(html)
   }
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }
</script>
@endsection