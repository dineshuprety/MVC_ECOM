
(function () {
    'use strict';
    $(document).ready(function () {

        //SWITCH PAGES
        switch ($("body").data("page-id")){
            case 'home':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.homeslider.homePageProducts();
                // SHOPIFYNEPAL.product.product_view();
                break;
            case 'product':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.product.details();
                break;
            case 'hotsales':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.homeslider.hotPageProducts();
                break;
            case 'search':
                SHOPIFYNEPAL.homeslider.mainjs();
                break;
            case 'auth':
                SHOPIFYNEPAL.homeslider.mainjs();
                break;
            case 'products':
            case 'categories':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.products.display();
                break;
            case 'cart':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.product.cart();
                break;
            case 'adminProduct':
                SHOPIFYNEPAL.admin.changeEvent();
                break;
            case 'adminCategories':
                SHOPIFYNEPAL.admin.update();
                SHOPIFYNEPAL.admin.delete();
                SHOPIFYNEPAL.admin.create();
                break;
            case 'adminSizes':
                SHOPIFYNEPAL.admin.delete();
                break;
            case 'adminSliderManage':
                SHOPIFYNEPAL.admin.delete();
                break;
            case 'inventory':
                SHOPIFYNEPAL.admin.delete();
                break;
            default:
                //do nothing
        }
    })

})();