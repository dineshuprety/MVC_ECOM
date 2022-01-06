(function () {
    'use strict';
    SHOPIFYNEPAL.admin.delete = function (){

        $('table[data-form="deleteForm"]').on('click', '.delete-item', function (e) {
            e.preventDefault();
            var form = $(this);

            $('#confirm').modal('show').on('click', '#deleted-btn', function () {
                form.submit();
            });
        });

    };

    SHOPIFYNEPAL.admin.cancel = function (){

        $('table[data-form="cancelForm"]').on('click', '.cancel-item', function (e) {
            e.preventDefault();
            var form = $(this);

            $('#confirmcancel').modal('show').on('click', '#cancel-btn', function () {
                $("#cancel-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                form.submit();
            });
        });

    };
})();