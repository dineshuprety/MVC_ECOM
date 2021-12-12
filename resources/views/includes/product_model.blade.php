<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><span>@{{item.title}}</span> </strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                     <img :src="'/' + item.product_image_path" class="card-img-top" alt="..." style="height: 200px; width: 200px;">
                  </div>
               </div>
               <!-- // end col md -->
               <div class="col-md-4">
                  <ul class="list-group">
                     <li v-if='item.product_on == 2' class="list-group-item">Product Price: <strong class="text-danger">Rs<span>@{{item.price}}</span></strong>
                        <!-- <del v-if='item.product_on == 2'>Rs @{{item.sales_price}}</del> -->
                     </li>
                     <li v-if='item.product_on == 1' class="list-group-item">Product Price: <strong class="text-danger">Rs<span >@{{item.sales_price}}</span></strong>
                     </li>
                     <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
                        <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 
                     </li>
                  </ul>
               </div>
               <!-- // end col md -->
               <div class="col-md-4">
                  
                  <div class="form-group" id="sizeArea">
                     <label for="size">Choose Size</label>
                     <select class="form-control" id="size" name="size">
                        <option>1</option>
                     </select>
                  </div>
                  
                  <input type="hidden" id="product_id">
                  <button type="submit" class="btn btn-primary mb-2" @click.prevent="addToCart(products.id)" >Add to Cart</button>
               </div>
               <!-- // end col md -->
            </div>
            <!-- // end row -->
         </div>
         <!-- // end modal Body -->
      </div>
   </div>
</div>
