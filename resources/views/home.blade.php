@extends('layouts.app') 
@section('title', 'Homepage')
@section('data-page-id', 'home') 
@section('headerclass', 'home-2')
@section('content')

<!-- el root  -->
<div class="display-products" data-token="{{ $token }}" id="root">
      <!-- Slider Arae Start -->
      <div class="slider-area">
         <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
            @if(count($slider)) @foreach($slider as $sliders)
            <!-- Slider Single Item Start -->
            <div class="slider-height-13 d-flex align-items-start justify-content-start bg-img" style="background-image:url(/{{str_replace('\\','/',$sliders->image_path)}}">
               <div class="container">
                  <div class="slider-content-15 slider-content-13 slider-animated-1 text-left">
                     <h1 class="animated">
                        <strong>{{$sliders['title']}}</strong>
                     </h1>
                     <p class="animated">{{$sliders['description']}}</p>
                     <a href="{{$sliders['url']}}" class="shop-btn animated">SHOP NOW</a>
                  </div>
               </div>
            </div>
            <!-- Slider Single Item End --> @endforeach @else
            <!-- Slider Single Item Start -->
            <div class="slider-height-13 d-flex align-items-start justify-content-start bg-img" style="background-image: url('https://estore.dineshuprety.com.np/ecom/assets/images/slider-image/sample-29.jpg');">
               <div class="container">
                  <div class="slider-content-15 slider-content-13 slider-animated-1 text-left">
                     <h1 class="animated"> Interior Design Furniture <br />
                        <strong>For Your Dream Room</strong>
                     </h1>
                     <p class="animated">Kiln-dried hardwood frame. Apartment friendly design Sinuous Spring suspension system</p>
                     <a href="/" class="shop-btn animated">SHOP NOW</a>
                  </div>
               </div>
            </div>
            <!-- Slider Single Item End --> @endif
         </div>
      </div>
   <!-- Slider Arae End -->
   <!-- Banner Area Start -->
      <div class="banner-3-area mt-30px">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                  <div class="banner-wrapper banner-box">
                     <a href="shop-4-column.html">
                     <img src="https://estore.dineshuprety.com.np/ecom/assets/images/banner-image/40.jpg" alt="" />
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                  <div class="banner-wrapper banner-box">
                     <a href="shop-4-column.html">
                     <img src="https://estore.dineshuprety.com.np/ecom/assets/images/banner-image/41.jpg" alt="" />
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="banner-wrapper banner-box">
                     <a href="shop-4-column.html">
                     <img src="https://estore.dineshuprety.com.np/ecom/assets/images/banner-image/42.jpg" alt="" />
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!-- Banner Area End -->

   <!-- Feature Tab Area Start -->
      <section class="category-tab-area mt-100px mb-70px">
         <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <!-- Section Title -->
               <div class="section-title underline-shape underline-shape-bottom">
                  <h2>Feature Products</h2>
                  <p>Feature products to weekly line up</p>
               </div>
               <!-- Section Title -->
            </div>
         </div>
         <!-- Tab panes -->
         <div class="tab-content">
            <!-- 1st tab start -->
            <div class="tab-pane active">
               <!-- Best Sell Slider Carousel Start -->
               <div class="best-sell-slider owl-carousel owl-nav-style-3">
                  <!-- Product Single Item --> @if(count($featureproducts)) @foreach($featureproducts as $featureproduct) 
                  <div class="product-inner-item">
                     <article class="list-product mb-30px">
                        <div class="img-block">
                           <a href="/product/{{$featureproduct['id']}}" class="thumbnail">
                           <img class="first-img" src="/{{$featureproduct['product_image_path']}}" alt="{{$featureproduct['title']}}" />
                           <img class="second-img" src="/{{$featureproduct['hover_image_path']}}" alt="{{$featureproduct['title']}}" />
                           </a>
                           <div class="add-to-link">
                              <ul>
                                 <li>
                                    <a @click="productView({{$featureproduct['id']}})" data-toggle="modal" data-target="#exampleModal" title="Add to Cart">
                                    <i class="ion-bag"></i>
                                    </a>
                                 </li>
                                 <!-- <li><a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal"><i class="ion-ios-search-strong"></i></a></li> -->
                              </ul>
                           </div>
                        </div>
                        <ul class="product-flag">
                           <li class="new">Feature</li>
                        </ul>
                        <div class="product-decs text-center">
                           <a class="inner-link" href="/product/{{$featureproduct['id']}}">
                           <span>Shopify Nepal</span>
                           </a>
                           <h2>
                              <a href="/product/{{$featureproduct['id']}}" class="product-link">{{substr($featureproduct['title'], 0, 18)}}..</a>
                           </h2>
                           <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                           <div class="pricing-meta">
                              <ul>
                                 <li class="old-price not-cut">रु {{$featureproduct['price']}}</li>
                              </ul>
                           </div>
                        </div>
                     </article>
                  </div>
                  @endforeach @else 
                  <p> NO DATA FOUND</p>
                  @endif
                  <!-- Best Sell Slider Carousel End -->
               </div>
            </div>
         </div>
      </section>
   <!-- Feature Tab Area end -->
   <!-- Static Countdown Area Start -->
      <section class="static-countdown-area" style="background-image: url('https://estore.dineshuprety.com.np/ecom/assets/images/section-bg/static-countdown-bg.jpg')">
         <div class="container">
            <div class="row">
               <div class="col-md-5 d-flex align-self-center">
                  <div class="static-countdown-content">
                     <h2>HOT DEALS PRODUCTS</h2>
                     <p class="countdown-price">रु 100 - रु 2k</p>
                     <p>Available in Shopifynepal </p>
                     <div class="clockdiv">
                        <div data-countdown="2021/11/01"></div>
                     </div>
                     <a class="shop_now" href="/hotsales">Shop Now</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Static Countdown Area End -->
   <!-- hotdeal Tab Area Start -->
      <section class="category-tab-area mt-100px mb-70px">
         <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <!-- Section Title -->
               <div class="section-title underline-shape underline-shape-bottom">
                  <h2>Hot Deals Products</h2>
                  <p>Hot deals products to weekly line up</p>
               </div>
               <!-- Section Title -->
            </div>
         </div>
         <!-- Tab panes -->
         <div class="tab-content">
            <!-- 1st tab start -->
            <div class="tab-pane active">
               <!-- Best Sell Slider Carousel Start -->
               <div class="best-sell-slider owl-carousel owl-nav-style-3">
                  @if(count($hotproducts))
                  <!-- Product Single Item --> @foreach($hotproducts as $hotproduct) 
                  <div class="product-inner-item">
                     <article class="list-product mb-30px">
                        <div class="img-block">
                           <a href="/product/{{$hotproduct['id']}}" class="thumbnail">
                           <img class="first-img" src="/{{$hotproduct['product_image_path']}}" alt="{{$hotproduct['title']}}" />
                           <img class="second-img" src="/{{$hotproduct['hover_image_path']}}" alt="{{$hotproduct['title']}}" />
                           </a>
                           <div class="add-to-link">
                              <ul>
                                 <li>
                                    <a @click="productView({{$hotproduct['id']}})" data-toggle="modal" data-target="#exampleModal" title="Add to Cart">
                                    <i class="ion-bag"></i>
                                    </a>
                                 </li>
                                 <!-- <li><a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal"><i class="ion-ios-search-strong"></i></a></li> -->
                              </ul>
                           </div>
                        </div>
                        <ul class="product-flag">
                           <li class="new">Sales</li>
                        </ul>
                        <div class="product-decs text-center">
                           <a class="inner-link" href="/product/{{$hotproduct['id']}}">
                           <span>Shopify Nepal</span>
                           </a>
                           <h2>
                              <a href="/product/{{$hotproduct['id']}}" class="product-link">{{substr($hotproduct['title'], 0, 18)}}..</a>
                           </h2>
                           <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                           <div class="pricing-meta">
                              @if($hotproduct['product_on'] == 1) 
                              <ul>
                                 <li class="old-price">रु {{$hotproduct['price']}}</li>
                                 <li class="current-price">रु {{$hotproduct['sales_price']}}</li>
                                 @php
                                 $discount_per = (($hotproduct['price'] - $hotproduct['sales_price']) * 100) / $hotproduct['price'];
                                 @endphp
                                 <li class="discount-price">-{{$discount_per}}%</li>
                              </ul>
                              @endif 
                           </div>
                        </div>
                     </article>
                  </div>
                  @endforeach @else 
                  <p> NO DATA FOUND</p>
                  @endif
               </div>
            </div>
         </div>
      </section>
   <!-- hot deal Tab Area end -->
   
   @include('includes.footer')

   <section class="category-tab-area mt-100px mb-70px">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <!-- Section Title -->
               <div class="section-title underline-shape underline-shape-bottom">
                  <h2>Products</h2>
                  <p> All products to weekly line up</p>
               </div>
               <!-- Section Title -->
            </div>
         </div>
         <!-- Tab panes -->
         <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-6" v-cloak v-for="product in products">
               <article class="list-product mb-30px">
                  <div class="img-block">
                     <a :href="'/product/'+ product.id" class="thumbnail">
                     <img class="first-img" :src="'/' + product.product_image_path" alt="" />
                     <img class="second-img" :src="'/' + product.hover_image_path" alt="" />
                     </a>
                     <div class="add-to-link">
                        <ul>
                           <li>
                              <a @click="productView(product.id)" data-toggle="modal" data-target="#exampleModal" title="Add to Cart">
                              <i class="ion-bag"></i>
                              </a>
                           </li>
                           <!-- <li><a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal"><i class="ion-ios-search-strong"></i></a></li> -->
                        </ul>
                     </div>
                  </div>
                  <ul class="product-flag">
                     <li class="new"  v-if='product.product_on == 1'>hot deals</li>
                     <li class="new"  v-else-if='product.product_on == 2'>feature</li>
                     <li class="new"  v-else>new</li>
                  </ul>
                  <div class="product-decs text-center">
                     <a class="inner-link" :href="'/product/'+ product.id">
                     <span>Shopify Nepal</span>
                     </a>
                     <h2>
                        <a :href="'/product/'+ product.id" class="product-link">@{{ stringLimit(product.title, 18) }}</a>
                     </h2>
                     <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
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
                  </div>
               </article>
            </div>
            <div class="center">
               <img v-show="loading" src="/images/icons/frontloading.gif" alt="frontloading.gif" width="60px">
            </div>
         </div>
   </section>
   @include('includes.product_model')
</div>
<!-- end -->

@stop