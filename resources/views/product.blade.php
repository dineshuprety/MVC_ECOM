@extends('layouts.app')
@section('title') {{$product->title}} @endsection
@section('headerclass', '')
@section('data-page-id', 'product')

@section('content')
        <div id="product" data-token="{{$token}}" data-id="{{ $product->id }}">
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
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
            <section class="product-details-area mtb-60px">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-img product-details-tab">
                                <div class="zoompro-wrap zoompro-2">
                                    <div class="zoompro-border zoompro-span">
                                        <img class="zoompro" :src="'/' + product.product_image_path" data-zoom-image="/{{$product->product_image_path}}" alt="" />
                                    </div>
                                </div>
                                <div id="gallery" class="product-dec-slider-2">
                                    <a class="active">
                                        <img class="zoompro" :src="'/' + product.product_image_path" :data-image="'/' + product.product_image_path" :data-zoom-image="'/' + product.product_image_path"/>
                                    </a>
                                    <a>
                                        <img class="zoompro" :src="'/' + product.hover_image_path" :data-image="'/' + product.hover_image_path" :data-zoom-image="'/' + product.hover_image_path"/>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-content">
                                <h2>@{{ product.title }}</h2>
                                <p class="reference">Shopifynepal</p>
                                <!-- <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div> -->
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">Rs @{{ product.price }}</li>
                                    </ul>
                                </div>
                              
                                <p v-html="stringLimit(product.description, 500)"></p>
                                <br>
                                
                                </div>
                                <div class="pro-details-size-color d-flex">
                                <div class="pro-details-color-wrap">
                                        
                                    </div>
                                    <div class="product-size">
                                        <span>Size</span>
                                        <select name="size">
                                            @foreach($productSize as $productSizes)
                                            <option value="{{$productSizes->size_id}}">{{ $size = \App\Models\Size::where('id',$productSizes->size_id)->value('name')}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
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
                </div>
            </section>
            <!-- Shop details Area End -->
        </div>   

           
   
@stop