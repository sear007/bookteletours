<div class="card h-100">
    <div class="card-body">
        <form class="needs-validation form_checkout" action="{{ route('tour.postCheckout', $tourType->id) }}"
            method="post" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}" name="name"
                            required type="text" class="form-control form-control-sm">
                        <div class="invalid-feedback">Please enter your your name.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" value="{{ auth()->user()->email }}" required type="text"
                            class="form-control form-control-sm">
                        <div class="invalid-feedback">Please enter your email address.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Select Date</label>
                    <input id="inputDate" name="date" required type="date" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Select Time</label>
                    <select class="form-control" id="optionTime" name="time" required>
                        <option></option>
                        @foreach ($tourType->tourTimes as $time)
                            <option value="{{ $time->id }}">{{ $time->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Solo Price</label>
                    <input price="{{ $tourType->price_solo }}" name="quantity_solo" id="priceSoloQuantity"
                        type="number" min="1" value="1" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Group Price</label>
                    <input price="{{ $tourType->price_group }}" name="quantity_group" id="priceGroupQuantity"
                        type="number" min="0" value="0" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Pick-up Adress</label>
                    <input type="text" id="site-address" name="pick_location" autocomplete="off"
                        class="form-control" />
                    <div style="position: relative">
                        <div id="site-suggestions"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phnone number</label>
                        <input name="telephone" value="" type="text" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border mb-3">
                        <label for="KHQR"
                            class="d-flex justify-content-start gap-10 align-items-center box-payment">
                            <input id="KHQR" checked name="payment_option" value="abapay_khqr" type="radio"
                                class="radio-payment mx-4">
                            <label for="KHQR">
                                <img height="60px" src="{{ asset('images/payments/KHQR.svg') }}" />
                            </label>
                            <label for="KHQR" class="payment-description">
                                <span class="mb-0">ABA KHQR</span>
                                <span class="mb-0 text-muted">Scan to pay with any banking app</span>
                            </label>
                        </label>
                        <label for="cards"
                            class="d-flex justify-content-start gap-10 align-items-center box-payment">
                            <input id="cards" name="payment_option" value="cards" type="radio"
                                class="radio-payment mx-4">
                            <label for="cards">
                                <img height="60px" src="{{ asset('images/payments/card.svg') }}" />
                            </label>
                            <label for="cards" class="payment-description">
                                <span class="mb-0">Credit/Debit Card</span>
                                <img height="22px" src="{{ asset('images/payments/cards.svg') }}" alt="">
                            </label>
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100">Next Step</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-loading-overlay">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/map_search.js') }}"></script>
@endpush
