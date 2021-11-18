(function (){
    'use strict';
    SHOPIFYNEPAL.product.cart = function () {

        var app = new Vue({
            el: '#shopping_cart',
            data: {
                items: [],
                cartTotal: [],
                loading: false,
                fail: false,
                message: ''
             },
             methods: {
                displayItems: function () {
                    this.loading = true;
                    setTimeout(function () {
                        axios.get('/cart/items').then(function (response) {
                            if(response.data.fail){
                                app.fail = true;
                                app.message = response.data.fail;
                                app.loading = false;
                            }else{
                                app.items = response.data.items;
                                app.cartTotal = response.data.cartTotal;
                                app.loading = false;
                            }
                        });
                    }, 2000);
                }
            },

            created: function (){
                this.displayItems();
            }
        });
      
    }
})();