(function () {
    'use strict';

    SHOPIFYNEPAL.product.details = function () {
        var app = new Vue({
            el:'#product',
            data: {
                product: [],
                category: [],
                subCategory: [],
                similarProducts: [],
                stock: [],
                productId: $('#product').data('id'),
                loading: false
            },
            methods:{
                getProductDetails: function () {
                    this.loading = true;
                    setTimeout(function () {
                        axios.get('/product-details/' + app.productId).then(function (response) {
                            app.product = response.data.product;
                            app.category = response.data.category;
                            app.subCategory = response.data.subCategory;
                            app.similarProducts = response.data.similarProducts;
                            app.stock = response.data.stock;
                            app.loading = false;
                        });
                    }, 1000);
                },
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
            },
            created: function () {
                this.getProductDetails();
            }
        });
    }

})();
