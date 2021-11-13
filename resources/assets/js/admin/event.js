(function () {

    'use strict';

    SHOPIFYNEPAL.admin.changeEvent = function () {
        $('#product-category').on('change', function () {
            var category_id = $('#product-category' + ' option:selected').val();
            $('#product-subcategory').html('Select Subcategory');

            $.ajax({
               type: 'GET',
               url: '/admin/category/' + category_id + '/selected',
               data:{category_id:category_id},
                success: function (response) {
                    var subcategories = jQuery.parseJSON(response);
                    if(subcategories.length){
                        $.each(subcategories, function (key, value) {
                            $('#product-subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }else {
                        $('#product-subcategory').append('<option value="">No record found</option>');
                    }
                }
            });
        })

        // text editor
        $(document).ready(function() {
            $('#summernote').summernote(
                {
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                  }
            );
          });
    }
})();