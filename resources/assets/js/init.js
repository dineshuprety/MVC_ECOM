
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
                SHOPIFYNEPAL.homeslider.search();
                break;
            case 'auth':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.validation.register();
                SHOPIFYNEPAL.validation.wholeser();
                SHOPIFYNEPAL.validation.login();
                break;
            case 'user':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.validation.changeinformation();
                SHOPIFYNEPAL.validation.changepassword();
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
            case 'checkout':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.product.checkout();
                break; 
            case 'cash':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.order.cash();
                break; 
            case 'contact':
                SHOPIFYNEPAL.homeslider.mainjs();
                SHOPIFYNEPAL.validation.contact();
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
            case 'adminSliderManage':
            case 'wholesalerusers':
            case 'inventory':
                SHOPIFYNEPAL.admin.PendingOrders();
                SHOPIFYNEPAL.admin.delete();
                break;
            case 'PendingOrders':
                SHOPIFYNEPAL.admin.PendingOrders();
                break;
            case 'ConfirmOrders':
                SHOPIFYNEPAL.admin.ConfirmOrders();
                break;
            case 'ProcessingOrders':
                SHOPIFYNEPAL.admin.ProcessingOrders();
                break;
            case 'PickedOrders':
                SHOPIFYNEPAL.admin.PickedOrders();
                break;
            case 'ShippedOrders':
                SHOPIFYNEPAL.admin.ShippedOrders();
                break;
            case 'DeliveredOrders':
                SHOPIFYNEPAL.admin.DeliveredOrders();
                break;
            case 'CancelOrders':
                SHOPIFYNEPAL.admin.CancelOrders();
                break;         
            default:
                //do nothing
        }
    })

})();