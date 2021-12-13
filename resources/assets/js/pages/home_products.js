(function () {
    'use strict';
   
SHOPIFYNEPAL.homeslider.homePageProducts = function (){
    
    var app = new Vue({
        el: '#root',
        data:{
            products: [],
            item: [],
            stock: [],
            size: [],
            count: 0,
            loading: false
        },

        methods:{
            getProducts: function () {
                this.loading = true;
                axios.get('/get-products').then(function(response){
                    // console.log(response.data);
                    app.products = response.data.products;
                    app.count = response.data.count;
                    app.loading = false;
                
                });
            },

            stringLimit: function (string, value) {
             return SHOPIFYNEPAL.module.truncateString(string, value);
            },
            

            discountedPrice: function (product_price) {
                return ((product_price.price - product_price.sales_price) * 100) / product_price.price;
            },

            addToCart: function (id) {
                
                SHOPIFYNEPAL.module.addItemToCart(id, function (message) {
                    $(".notify").css("display", 'block').delay(4000).slideUp(300)
                        .html(message);
                    // alert(message);
                });
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
                var token = $('.display-products').data('token');
                this.loading = true;
                var postdata = { next: 4, token: token, count: this.count };
                SHOPIFYNEPAL.module.loadMore('/load-more', postdata, function (response) {
                    app.products = response.products;
                    app.count = response.count;
                    app.loading = false;
                });
            }
            
        },
       
        created: function (){
           this.getProducts();
           this.productView();
        },

        mounted: function () {
            $(window).scroll(function () {
                if($(window).scrollTop() + $(window).height() == $(document).height()){
                    app.loadMoreProducts();
                }
            });
        }
    

    });
}


})();