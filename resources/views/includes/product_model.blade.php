
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="tab-content quickview-big-img">
                     <div id="pro-1" class="tab-pane fade show active">
                        <img :src="'/' + item.product_image_path" alt="" />
                     </div>
                  </div>
                  <!-- Thumbnail Large Image End -->
               </div>
               <div class="col-md-7 col-sm-12 col-xs-12">
                  <div class="product-details-content quickview-content">
                     <h2>@{{ item.title }}</h2>
                     <p class="reference">Stock: <span>@{{stock}}</span></p>
                     <div class="pricing-meta">
                     <ul v-if="item.product_on == 1">
                           <li class="old-price">रु @{{item.price}}</li>
                           <li class="current-price">रु @{{item.sales_price}}</li>
                           <li class="discount-price">-@{{ discountedPrice(item) }}%</li>
                        </ul>
                        <ul v-else>
                           <li class="old-price not-cut">रु @{{item.price}}</li>
                        </ul>
                        
                     </div>
                     <p class="substring" v-html="item.description"></p>

                     <span><a class="reviews":href="'/product/'+ item.id">Read More</a></span>
                     <div v-if="stock > 0" class="pro-details-quality">
                           <select class='size'>
                           <!-- <div v-for="(sizes, indexs) in size" :key="indexs"> -->
                           <option v-for="sizes in size" :value="sizes[0].id">@{{sizes[0].name}}</option>
                           <!-- </div> -->
                           </select>
                              <div class="pro-details-cart btn-hover" >
                                 <a style="cursor: context-menu;" @click.prevent="addToCart(item.id)"> + Add To Cart</a>
                              </div>
                     </div>
                     <div v-else class="pro-details-quality">
                              <div class="pro-details-cart btn-hover">
                                 <button disabled> Out Of Stock </button>
                              </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal end -->