@extends('layouts.app')
@section('title') {{$searchTerm}} @endsection
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
                                    <a class="active" href="#shop-1" data-toggle="tab">
                                        <i class="fa fa-th"></i>
                                    </a>
                                    
                                    <p>There Are {{count($searchResults)}} Products.</p>
                                </div>
                                <!-- Left Side End -->
                                <!-- Right Side Start -->
                                <!-- <div class="select-shoing-wrap">
                                    <div class="shot-product">
                                        <p>Sort By:</p>
                                    </div>
                                    <div class="shop-select">
                                        <select>
                                            <option value="">Sort by newness</option>
                                            <option value="">A to Z</option>
                                            <option value=""> Z to A</option>
                                            <option value="">In stock</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- Right Side End -->
                            </div>
                            <!-- Shop Top Area End -->

<div class="row">
    <div class="col-xl-3 col-md-4 col-sm-6">
         @if(count($searchResults))
            <!-- Product Single Item --> @foreach($searchResults as $searchResult) 
            <div class="product-inner-item">
               <article class="list-product mb-30px">
                  <div class="img-block">
                     <a href="/product/{{$searchResult['id']}}" class="thumbnail">
                     <img class="first-img" src="/{{$searchResult['product_image_path']}}" alt="{{$searchResult['title']}}" />
                     <img class="second-img" src="/{{$searchResult['hover_image_path']}}" alt="{{$searchResult['title']}}" />
                     </a>
                     <div class="add-to-link">
                        <ul>
                           <li>
                              <a href="#" title="Add to Cart">
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
                     <a class="inner-link" href="/product/{{$searchResult['id']}}">
                     <span>Shopify Nepal</span>
                     </a>
                     <h2>
                        <a href="/product/{{$searchResult['id']}}" class="product-link">{{$searchResult['title']}}</a>
                     </h2>
                     <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                     <div class="pricing-meta">
                        @if($searchResult['product_on'] == 1) 
                        <ul>
                           <li class="old-price">Rs {{$searchResult['price']}}</li>
                           <li class="current-price">Rs {{$searchResult['sales_price']}}</li>
                           @php
                           $discount_per = (($searchResult['price'] - $searchResult['sales_price']) * 100) / $searchResult['price'];
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
       
@stop