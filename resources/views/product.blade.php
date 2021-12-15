@extends('layouts.app')
@section('title') {{$product->title}} @endsection
@section('headerclass', '')
@section('data-page-id', 'product')
@section('content')
<div id="product" data-token="{{$token}}" data-id="{{ $product->id }}">
<div class="product-center">
   <img v-show="loading" src="/images/icons/loading.gif" alt="frontloading.gif" width="70px">
</div>
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area"  v-cloak v-if="loading == false">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breadcrumb-content">
               <h1 class="breadcrumb-hrading">@{{stringLimit(product.title,10)}}</h1>
               <ul class="breadcrumb-links">
                  <li><a :href="'/product/category/' + category.slug">@{{ category.name }}</a></li>
                  <li><a :href="'/product/subcategory/' + subCategory.slug"> @{{ subCategory.name }}</a></li>
                  <li>@{{ stringLimit(product.title,20) }}</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Shop details Area start -->
<section class="product-details-area mtb-60px" v-if="loading == false">
   <div class="container" v-cloak>
      <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="product-details-img product-details-tab">
               <div class="zoompro-wrap zoompro-2">
                  <div class="zoompro-border zoompro-span">
                     <img class="zoompro" :src="'/' + product.product_image_path"  alt="" />
                  </div>
               </div>
               <div id="gallery" class="product-dec-slider-2">
                  <a class="active">
                  <img class="zoompro" :src="'/' + product.product_image_path" />
                  </a>
                  <a>
                  <img class="zoompro" :src="'/' + product.hover_image_path"/>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="product-details-content">
               <h2>@{{ product.title }}</h2>
               <p class="reference">Shopifynepal</p>
               <div class="pricing-meta">
               <ul v-if="product.product_on == 1">
                           <li class="old-price">रु @{{product.price}}</li>
                           <li class="current-price">रु @{{product.sales_price}}</li>
                           <li class="discount-price">-@{{ discountedPrice(product) }}%</li>
                        </ul>
                        <ul v-else>
                           <li class="old-price not-cut">रु @{{product.price}}</li>
                        </ul>
               </div>
               <p v-html="stringLimit(product.description, 500)"></p>
               <br>
            </div>
            <div v-if="stock > 0">
               <div class="pro-details-size-color d-flex">
                  <div class="pro-details-color-wrap">
                  
                  </div>
                  <div class="product-size">
                     <span>Size</span>
                     <select class="working" id="size">
                        @foreach($productSize as $productSizes)
                        <option data-id="{{$productSizes->size_id}}">{{ $size = \App\Models\Size::where('id',$productSizes->size_id)->value('name')}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div  class="pro-details-quality">
         
                  <div class="pro-details-cart btn-hover">
                     <a style="cursor: context-menu;" @click.prevent="addToCart(product.id)"> + Add To Cart</a>
                  </div>
               </div>
            </div>
            <div v-else>
               <div class="pro-details-size-color d-flex">
                  <div class="pro-details-color-wrap">
                  
                  </div>
                  <div class="product-size">
                     <span>Size</span>
                     <select class="working" disabled id="size" title="Out of stock">
                       <option>Xl</option>
                     </select>
                  </div>
               </div>
               <div  class="pro-details-quality">
         
                  <div class="pro-details-cart">
                     <button class="btn" title="Out of Stock"> Out Of Stock</button>
                  </div>
               </div>
            </div>

            <div class="pro-details-social-info">
               <span>Share</span>
               <div class="social-info">
                  <ul>
                     <li>
                        <a href="#"><i class="ion-social-facebook"></i></a>
                     </li>
                     <li>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                     </li>
                     <li>
                        <a href="#"><i class="ion-social-google"></i></a>
                     </li>
                     <li>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="pro-details-policy">
               <ul>
                  <li><img src="/images/icons/policy.png" alt="" /><span>Security Policy (Edit With Customer Reassurance Module)</span></li>
                  <li><img src="/images/icons/policy-2.png" alt="" /><span>Delivery Policy (Edit With Customer Reassurance Module)</span></li>
                  <li><img src="/images/icons/policy-3.png" alt="" /><span>Return Policy (Edit With Customer Reassurance Module)</span></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Shop details Area End -->
<div class="description-review-area mb-60px"  v-cloak v-if="loading == false">
   <div class="container">
      <div class="description-review-wrapper">
         <div class="description-review-topbar nav">
            <a data-toggle="tab" href="#des-details1" class="active">Description</a>
            <a class="" data-toggle="tab" href="#des-details1">Product Details</a>
            <a data-toggle="tab" href="#des-details3" class="">Reviews</a>
         </div>
         <div class="tab-content description-review-bottom">
            <div id="des-details1" class="tab-pane active">
               <div class="product-description-wrapper">
                  <p v-html="stringLimit(product.description,2000)"></p>
               </div>
            </div>
            <div id="des-details3" class="tab-pane">
               <div class="row">
                  <div class="col-lg-5">
                     <div class="ratting-form-wrapper pl-50">
                        <h1 class="text-center">Comming soon</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="category-tab-area mt-100px mb-70px"  v-cloak v-if="loading == false">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <!-- Section Title -->
            <div class="section-title underline-shape underline-shape-bottom">
               <h2>SimilarProduct</h2>
               <p> All SimilarProduct</p>
            </div>
            <!-- Section Title -->
         </div>
      </div>
      <!-- Tab panes -->
      <div class="row" v-cloak>
         <div class="col-xl-3 col-md-4 col-sm-6"  v-for="similarProduct in similarProducts">
            <article class="list-product mb-30px">
               <div class="img-block">
                  <a :href="'/product/'+ similarProduct.id" class="thumbnail">
                  <img class="first-img" :src="'/' + similarProduct.product_image_path" alt="" />
                  <img class="second-img" :src="'/' + similarProduct.hover_image_path" alt="" />
                  </a>
                  <div class="add-to-link">
                     <ul>
                        <li>
                           <a @click.prevent="addToCart(similarProduct.id)" title="Add to Cart">
                           <i class="ion-bag"></i>
                           </a>
                        </li>
                        <!-- <li><a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal"><i class="ion-ios-search-strong"></i></a></li> -->
                     </ul>
                  </div>
               </div>
               <ul class="product-flag">
                  <li class="new"  v-if='similarProduct.product_on == 1'>hot deals</li>
                  <li class="new"  v-else-if='similarProduct.product_on == 2'>feature</li>
                  <li class="new"  v-else>new</li>
               </ul>
               <div class="product-decs text-center">
                  <a class="inner-link" :href="'/product/'+ similarProduct.id">
                  <span>Shopify Nepal</span>
                  </a>
                  <h2>
                     <a :href="'/product/'+ similarProduct.id" class="product-link">@{{ stringLimit(similarProduct.title, 18) }}</a>
                  </h2>
                  <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                  <div class="pricing-meta">
                     <ul v-if="similarProduct.product_on == 1">
                        <li class="old-price">रु @{{similarProduct.price}}</li>
                        <li class="current-price">रु @{{similarProduct.sales_price}}</li>
                        <li class="discount-price">-@{{ discountedPrice(similarProduct) }}%</li>
                     </ul>
                     <ul v-else>
                        <li class="old-price not-cut">रु @{{similarProduct.price}}</li>
                     </ul>
                  </div>
               </div>
            </article>
         </div>
      </div>
</section>
</div>   
@stop