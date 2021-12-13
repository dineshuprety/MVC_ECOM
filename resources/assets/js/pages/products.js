(function () {
    'use strict';

    SHOPIFYNEPAL.products.display = function () {
        var app = new Vue({
            el:'#root',
            data: {
                products: [],
                item: [],
                stock: [],
                size: [],
                count: 0,
                loading: false,
                next: 8,
                targetElement: $('.display-products'),
                loadMoreEndpoint: '/products/category/load-more'
            },
            methods:{
                stringLimit: function (string, value) {
                    return SHOPIFYNEPAL.module.truncateString(string, value);
                },
                addToCart: function (id) {
                    SHOPIFYNEPAL.module.addItemToCart(id, function (message) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(message);
                    });
                },
                discountedPrice: function (product_price) {

                    return ((product_price.price - product_price.sales_price) * 100) / product_price.price;
    
                },
                productView: function (id) {
                    SHOPIFYNEPAL.module.productModule(id, function (response) {
                        app.item = response.item;
                        app.size = response.sizes;
                        app.stock = response.stock;
                        // console.log(app.size);
                    });
                },
                loadMoreProducts: function () {
                    var token = this.targetElement.data('token');
                    var urlParams = this.targetElement.data('urlparams');
                    this.loading = true;
                    var postData = { next: this.next, token: token, count: this.count };

                    if(typeof urlParams !== 'undefined' && urlParams){
                        postData.slug = urlParams.slug;
                        if(typeof urlParams.subcategory !== 'undefined'){
                            postData.subcategory = urlParams.subcategory;
                        }
                    }
                    SHOPIFYNEPAL.module.loadMore(this.loadMoreEndpoint, postData, function (response) {
                        app.products = response.products;
                        app.count = response.count;
                        app.loading = false;
                        app.next  += 4;
                    });
                }
            },
            created: function () {
                this.loadMoreProducts();
            },
            mounted: function () {
                $(window).scroll(function () {
                    if($(window).scrollTop() + $(window).height() == $(document).height()){
                        app.loadMoreProducts();
                    }
                })
            }
        });
    }
})();
