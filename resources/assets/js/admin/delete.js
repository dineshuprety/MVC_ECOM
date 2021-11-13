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
})();