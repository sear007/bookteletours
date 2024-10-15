<div class="row justify-content-center">
    <div class="col-md-6">
        <div>
            <form 
                id="aba_merchant_request" 
                action="{{env('ABA_PAYWAY_API_CHECKOUT_URL')}}" 
                enctype="multipart/form-data" method="POST" target="aba_webservice" id="aba_merchant_request">
            </form>
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title text-dark font-weight-bold mb-0">Pay Invoice</h6>
                    <a href="{{route('checkout.invoicePdf', request('tran_id'))}}" class="font-weight-bold text-dark "><i class="fa fa-lg fa-file-pdf"></i></a>
                </div>
                <div class="card-body">
                    <p class="mb-0 text-dark">Payment amount</p>
                    <h3 id="invoice_price"></h3>
                    <div class="bg-light border p-3 small">
                        <p class="mb-0 text-dark">Name: <span id="invoice_name" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Email: <span id="invoice_email" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Hotel: <span id="invoice_hotel" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Room: <span id="invoice_room" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Checkin: <span id="invoice_date_from" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Checkout: <span id="invoice_date_to" class="text-muted"></span></p>
                        <p class="mb-0 text-dark">Payment Method: <span id="invoice_payment_option" class="text-muted"></span></p>
                        <input type="hidden" id="invoice_tran_id">
                        <input type="hidden" id="invoice_req_time">
                    </div>
                    <button id="checkout_button" class="w-100 btn btn-primary mt-3 font-weight-bold"><i class="fa fa-dollar mr-1"></i>Pay Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
