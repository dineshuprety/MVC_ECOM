@extends('layouts.app') 
@section('title', 'Products') 
@section('data-page-id', 'products') 
@section('content') 
<div class="home">
  <section class="display-products" data-token="{{ $token }}" id="root">
    <!-- Breadcrumb Area start -->
    <section class="breadcrumb-area"  v-cloak>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb-content">
              <h1 class="breadcrumb-hrading">Shop Page</h1>
              <ul class="breadcrumb-links">
                <li>
                  <a href="/">Home</a>
                </li>
                <li>shop</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- Shop Category Area End -->
    <div class="shop-category-area"  v-cloak>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- Shop Top Area Start -->
            <div class="shop-top-bar">
              <!-- Left Side start -->
              <div class="shop-tab nav mb-res-sm-15">
                <a>
                  <i class="ionicons ion-ios-search-strong"></i>
                </a>
                <p>There Are @{{products.length}} Products.</p>
              </div>
              <!-- Left Side End -->
            </div>
            <!-- Shop Top Area End -->
            <!-- Shop Bottom Area Start -->
            <div class="shop-bottom-area mt-35">
              <div class="row">
                <!-- Product Single Item -->
                <div class="col-xl-3 col-md-4 col-sm-6"  v-cloak v-for="product in products">
                  <div class="product-inner-item">
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
                        <li class="new" v-if='product.product_on == 1'>hot deals</li>
                        <li class="new" v-else-if='product.product_on == 2'>feature</li>
                        <li class="new" v-else>new</li>
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
                 </div>
                 <div class="center">
                    <img v-show="loading" src="/images/icons/frontloading.gif" alt="frontloading.gif" width="60px">
                </div>
              </div>
            </div>
            
          </div>
          <div class="center">
               <img v-show="loading" src="/images/icons/frontloading.gif" alt="frontloading.gif" width="60px">
            </div>
          <!-- Shop Bottom Area End -->
        </div>
      </div>
    </div>
    <!-- Shop Category Area End -->
    @include('includes.product_model')
  </section>
 
</div> @stop