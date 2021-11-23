@extends('layouts.app')
@section('title', 'Your Shopping Cart') 
@section('data-page-id', 'cart')
@section('headerclass', '')

@section('content')
<div class="shopping_cart" id="shopping_cart">
<div class="product-center">
               <img v-show="loading" src="/images/icons/loading.gif" alt="frontloading.gif" width="70px">
            </div>
    <!-- Breadcrumb Area start -->
    <section class="breadcrumb-area" v-if="loading == false">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Cart Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- cart area start -->
            <div class="cart-main-area mtb-60px" v-cloak v-if="loading == false">
                <div class="container">
                    <h2 v-if="fail" v-text="message" ></h2>
                    <div v-else>
                    <h3 class="cart-page-title">Your Cart Items</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <form action="#">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Until Price</th>
                                                    <th>Qty</th>
                                                    <th>Size</th>
                                                    <th>Subtotal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="item in items">
                                                    <td class="product-thumbnail">
                                                        <a :href="'/product/' + item.id"><img :src="'/' + item.image" height="60px" width="60px" alt="item.title"  /></a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a :href="'/product/' + item.id">
                                                        @{{ item.title }}
                                                        </a><br>
                                                        Status:
                                                        <span v-if="item.stock > 1" style="color: #00AA00;">In Stock</span>
                                                        <span v-else style="color: #ff0000;">Out of Stock</span>
                                                    </td>
                                                    <td class="product-price-cart"><span class="amount">Rs @{{ item.price }}</span></td>
                                                    <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="number" name="qtybutton" v-bind:value="item.quantity" min="1" max="20">
                                                    </div>
                                                    </td>
                                                    <td class="product-quantity">
                                                    @{{ item.size }}
                                                    </td>
                                                    <td class="product-subtotal">Rs @{{ item.total }}</td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="ionicons ion-edit"></i></a>
                                                        <a href="#"><i class="ionicons ion-android-delete"></i></a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cart-shiping-update-wrapper">
                                                <div class="cart-shiping-update">
                                                    <a href="#">Continue Shopping</a>
                                                </div>
                                                <div class="cart-clear">
                                                    <button>Update Shopping Cart</button>
                                                    <a href="#">Clear Shopping Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    
                                    <div class="col-lg-5 col-md-12">
                                        <div class="discount-code-wrapper">
                                            <div class="title-wrap">
                                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                            </div>
                                            <div class="discount-code">
                                                <p>Enter your coupon code if you have one.</p>
                                                <form>
                                                    <input type="text" required="" name="name" />
                                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12">
                                        <div class="grand-totall">
                                            <div class="title-wrap">
                                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                            </div>
                                            <h5>Total products <span>$260.00</span></h5>
                                            <div class="total-shipping">
                                                <h5>Total shipping</h5>
                                                <ul>
                                                    <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                                    <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                                </ul>
                                            </div>
                                            <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                                            <a href="#">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <!-- cart area end -->
</div>


       
@stop