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

    SHOPIFYNEPAL.admin.ConfirmOrders = function () {

            $('#confirm-buttons').DataTable({
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
                   "url": "/confirm/orders/list",
                   "type": "POST",
                   "datatype": "json",
                   error: function(){
                    $("#confirm-buttons_processing").css("display","none");
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

    SHOPIFYNEPAL.admin.ProcessingOrders = function () {

        $('#processing-buttons').DataTable({
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
               "url": "/processing/orders/list",
               "type": "POST",
               "datatype": "json",
               error: function(){
                $("#processing-buttons_processing").css("display","none");
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

    SHOPIFYNEPAL.admin.PickedOrders = function () {

        $('#picked-buttons').DataTable({
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
               "url": "/picked/orders/list",
               "type": "POST",
               "datatype": "json",
               error: function(){
                $("#picked-buttons_processing").css("display","none");
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

    SHOPIFYNEPAL.admin.ShippedOrders = function () {

        $('#shipped-buttons').DataTable({
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
               "url": "/shipped/orders/list",
               "type": "POST",
               "datatype": "json",
               error: function(){
                $("#shipped-buttons_processing").css("display","none");
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

    SHOPIFYNEPAL.admin.DeliveredOrders = function () {

        $('#delivered-buttons').DataTable({
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
               "url": "/delivered/orders/list",
               "type": "POST",
               "datatype": "json",
               error: function(){
                $("#deliverd-buttons_processing").css("display","none");
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

    SHOPIFYNEPAL.admin.CancelOrders = function () {

        $('#cancel-buttons').DataTable({
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
               "url": "/cancel/orders/list",
               "type": "POST",
               "datatype": "json",
               error: function(){
                $("#cancel-buttons_processing").css("display","none");
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