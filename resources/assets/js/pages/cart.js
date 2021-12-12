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
                },

                updateQuantity: function (product_id,operator,size,qty) {

                    var postData = $.param({product_id:product_id, operator:operator, size:size, qty:qty});
                    axios.post('/cart/update-qty', postData).then(function (response) {
                        app.displayItems(200);
                    })
                },
                removeItem: function (product_id, size) {
                    var postData = $.param({product_id:product_id, size:size});
                    axios.post('/cart/remove-item', postData).then(function (response) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(response.data.success);
                        app.displayItems(200);
                    })
                }
            },

            created: function (){
                this.displayItems();
            }
        });
      
    }
})();  