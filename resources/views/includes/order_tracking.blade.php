<!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="post" action="/order/tracking">
            <div class="modal-body">
               <label>Invoice Code</label>
               <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">
               <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}" />           
               <button class="btn btn-danger" type="submit" style="margin-top: 17px;"> Track Now </button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- track order model end -->
