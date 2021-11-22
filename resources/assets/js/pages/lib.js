(function () {
    'use strict';

    SHOPIFYNEPAL.module= {

    
        truncateString: function limit(string, value) {

            if(string.length > value){
                return string.substring(0, value) + '...';
            }else{
                return string;
            }
        },
        addItemToCart: function (id, callback) {
            var token = $('.display-products').data('token');
                   
                if(token == null || !token){
                    token = $('#product').data('token');
                    var size = $('#size' + 'option:selected').data('id');
                    alert(size);
                    
                }
    
                var postData = $.param({product_id: id, token: token, size_id: size});
                axios.post('/cart', postData).then(function (response) {
                    callback(response.data.success);
                })
        },
        loadMore: function (endpoint, $postData, callback) {
            var postdata = $.param($postData);
            axios.post(endpoint, postdata).then(function (response) {
                    callback(response.data);
            });
        }
    }
})();