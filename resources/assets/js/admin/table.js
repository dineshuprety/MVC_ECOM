(function () {

    'use strict';

    SHOPIFYNEPAL.admin.PendingOrders = function () {

       
        $('#datatable-buttons').DataTable({
                "dom": 'Bfrtip',
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        title: 'copyPendingList'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'PendingList'
                    }
                ],
                "ajax": {
                   "url": "/pending/orders/list",
                   "type": "POST",
                   "datatype": "json",
                   error: function(){
                    $("#datatable-buttons_processing").css("display","none");
                  }
                },
                "columns": [
                    {data: 'name'},
                    {data: 'order_date'},
                    {data: 'invoice_no'},
                    {data: 'amount'},
                    {data: 'payment_method'},
                    {data: 'status'},
                    {data: 'action'},
                ],
                    
            });
        
    }
})();