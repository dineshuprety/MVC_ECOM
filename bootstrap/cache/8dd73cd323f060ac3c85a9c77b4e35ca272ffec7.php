<?php $__env->startSection('title'); ?> <?php echo e($searchTerm); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('data-page-id', 'search'); ?>
<?php $__env->startSection('headerclass', ''); ?>

<?php $__env->startSection('content'); ?>

<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Search Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="/">Home</a></li>
                                    <li><?php echo e($searchTerm); ?></li>
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
                                    
                                    <p>There Are <?php echo e(count($searchResults)); ?> Products.</p>
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
         <?php if(count($searchResults)): ?>
            <!-- Product Single Item --> <?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="product-inner-item">
               <article class="list-product mb-30px">
                  <div class="img-block">
                     <a href="/product/<?php echo e($searchResult['id']); ?>" class="thumbnail">
                     <img class="first-img" src="/<?php echo e($searchResult['product_image_path']); ?>" alt="<?php echo e($searchResult['title']); ?>" />
                     <img class="second-img" src="/<?php echo e($searchResult['hover_image_path']); ?>" alt="<?php echo e($searchResult['title']); ?>" />
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
                     <a class="inner-link" href="/product/<?php echo e($searchResult['id']); ?>">
                     <span>Shopify Nepal</span>
                     </a>
                     <h2>
                        <a href="/product/<?php echo e($searchResult['id']); ?>" class="product-link"><?php echo e($searchResult['title']); ?></a>
                     </h2>
                     <!-- <div class="rating-product"><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></div> -->
                     <div class="pricing-meta">
                        <?php if($searchResult['product_on'] == 1): ?> 
                        <ul>
                           <li class="old-price">Rs <?php echo e($searchResult['price']); ?></li>
                           <li class="current-price">Rs <?php echo e($searchResult['sales_price']); ?></li>
                           <?php 
                           $discount_per = (($searchResult['price'] - $searchResult['sales_price']) * 100) / $searchResult['price'];
                            ?>
                           <li class="discount-price">-<?php echo e($discount_per); ?>%</li>
                        </ul>
                        <?php endif; ?> 
                     </div>
                  </div>
               </article>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?> 
            <p> NO DATA FOUND</p>
            <?php endif; ?>
</div>
</div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>