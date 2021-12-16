(function () {
    'use strict';
   
SHOPIFYNEPAL.validation.valid = function (){

    
    var app = new Vue({
        el: '#auth',
        data:{
            loading: false,
            fail: false,
            message: '',
        },

        methods:{
            getError: function () {
                this.loading = true;
                        axios.get('/checkout').then(function (response) {
                            if(response.data.fail){
                                app.fail = true;
                                app.message = response.data.fail;
                                $(".notify").css("display", 'block').delay(4000).slideUp(300)
                                .html(app.message);
                                app.loading = false;
                                
                            }else{
                                
                            }
                        });
            },


           
            
        },
       
        created: function (){
           this.getError();
          
        },


    });
}


})();