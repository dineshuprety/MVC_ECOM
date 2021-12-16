(function (){
    'use strict';
    SHOPIFYNEPAL.product.checkout = function () {

        var app = new Vue({
            el: '#checkout',
            data: {
                items: [],
                cartTotal: [],
                loading: false,
                fail: false,
                message: '',
             },
             methods: {
                displayItems: function () {
                    this.loading = true;
                    setTimeout(function () {
                        axios.get('/checkout/items').then(function (response) {
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
                    }, 1000);
                },

                stringLimit: function (string, value) {
                    return SHOPIFYNEPAL.module.truncateString(string, value);
                   },

            },

            created: function (){
                this.displayItems();
            }
        });

      
    }
})();  