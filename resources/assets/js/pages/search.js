(function () {
    'use strict';
   
SHOPIFYNEPAL.homeslider.search = function (){
    
    var app = new Vue({
        el: '#search',
        data:{
            item: [],
            stock: [],
            size: [],
            count: 0,
            loading: false
        },

        methods:{
          
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
        },
       
        created: function (){
           this.productView();
        },

       

    });
}


})();