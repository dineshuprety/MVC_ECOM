
(function () {
    'use strict';
    $(document).ready(function () {

        //SWITCH PAGES
        switch ($("body").data("page-id")){
            case 'home':
                break;
            case 'adminCategories':
                SHOPIFYNEPAL.admin.update();
                SHOPIFYNEPAL.admin.delete();
                SHOPIFYNEPAL.admin.create();
                break;
            default:
                //do nothing
        }
    })

})();