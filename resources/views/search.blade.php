@extends('layouts.app')
@section('title')  @endsection
@section('data-page-id', 'search')
@section('headerclass', '')
@section('content')
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breadcrumb-content">
               <h1 class="breadcrumb-hrading">Search Page</h1>
               <ul class="breadcrumb-links">
                  <li><a href="/">Home</a></li>
                  <li>{{$searchTerm}}</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->

   <!-- Shop Category Area End -->
   <div class="shop-category-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- Shop Top Area Start -->
                            <div class="shop-top-bar">
                                <!-- Left Side start -->
                                <div class="shop-tab nav mb-res-sm-15">
                                    <a >
                                        <i class="fa fa-th show_grid"></i>
                                    </a>
                                    
                                    <p>There Are 17 Products.</p>
                                </div>
                                <!-- Left Side End -->
                                
                            </div>
                            <!-- Shop Top Area End -->

                            <!-- Shop Bottom Area Start -->
                            <div class="shop-bottom-area mt-35">
                            <div class="row">
                                            <div class="col-xl-3 col-md-4 col-sm-6">
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
                                    <a @click.prevent="addToCart({{$hotproduct['id']}})" title="Add to Cart">
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
                              <a href="/product/{{$hotproduct['id']}}" class="product-link">{{$hotproduct['title']}}</a>
                           </h2>
                           <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                           <div class="pricing-meta">
                              @if($hotproduct['product_on'] == 1) 
                              <ul>
                                 <li class="old-price">Rs {{$hotproduct['price']}}</li>
                                 <li class="current-price">Rs {{$hotproduct['sales_price']}}</li>
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
                            <!-- Shop Bottom Area End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Category Area End -->
@stop