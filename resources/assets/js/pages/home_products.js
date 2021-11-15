(function () {
    'use strict';
   
SHOPIFYNEPAL.homeslider.homePageProducts = function (){
    
    var app = new Vue({
        el: '#root',
        data:{
            products: [],
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
                if(string.length > value){
                    return string.substring(0, value) + '...';
                }else{
                    return string;
                }
            },

            discountedPrice: function (product) {

                return ((product.price - product.sales_price) * 100) / product.price;

            },

            loadMoreProducts: function () {
                var token = $('.display-products').data('token');
                this.loading = true;
                    var data = $.param({next: 4, token: token, count: app.count});
                    axios.post('/load-more', data)
                        .then(function (response) {
                            app.products = response.data.products;
                            app.count = response.data.count;
                            app.loading = false;
                        });
                
            }
            
        },
       
        created: function (){
           this.getProducts();
        },

        mounted: function () {
            $(window).scroll(function () {
                if($(window).scrollTop() + $(window).height() == $(document).height()){
                    app.loadMoreProducts();
                }else{
                    app.loading = false;
                }
            })
        }
    

    });
}


})();