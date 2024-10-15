<div class="row mt-3">
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-body">
                <form class="needs-validation" action="/checkout" method="post" id="form_checkout" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" name="name" required type="text" class="form-control form-control-sm">
                                <div class="invalid-feedback">Please enter your your name.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" value="{{auth()->user()->email}}" required type="text" class="form-control form-control-sm">
                                <div class="invalid-feedback">Please enter your email address.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>CheckIn - CheckOut</label>
                            <input readonly type="text" id="input-filter-date" class="form-control" >
                            <input name="date_from" id="check_in_date" required type="hidden" />
                            <input name="date_to" id="check_out_date" required type="hidden" />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rooms">Rooms</label>
                                <input name="num_rooms" value="1" id="roomQuantity" required min="1" type="number" class="form-control form-control-sm">
                                <div class="invalid-feedback">How many room would you like to make reservation ?.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guests">Guests</label>
                                <input id="guest_number" name="guest_number" value="1" required min="1" type="number" class="form-control form-control-sm">
                                <div class="invalid-feedback">How many guests ?.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border mb-3">
                                <label for="KHQR" class="d-flex justify-content-start gap-10 align-items-center box-payment">
                                    <input id="KHQR" checked name="payment_option" value="abapay_khqr" type="radio" class="radio-payment mx-4" >
                                    <label for="KHQR">
                                        <img height="60px" src="{{asset('images/payments/KHQR.svg')}}" />
                                    </label>
                                    <label for="KHQR" class="payment-description">
                                        <span class="mb-0">ABA KHQR</span>
                                        <span class="mb-0 text-muted">Scan to pay with any banking app</span>
                                    </label>
                                </label>
                                <label for="cards" class="d-flex justify-content-start gap-10 align-items-center box-payment">
                                    <input id="cards" name="payment_option" value="cards" type="radio" class="radio-payment mx-4" >
                                    <label for="cards">
                                        <img height="60px" src="{{asset('images/payments/card.svg')}}" />
                                    </label>
                                    <label for="cards" class="payment-description">
                                        <span class="mb-0">Credit/Debit Card</span>
                                        <img height="22px" src="{{asset('images/payments/cards.svg')}}" alt="">
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12"><button type="submit" class="btn btn-primary w-100">Next Step</button></div>
                    </div>
                    <input name="branch_id" readonly type="hidden" value="{{$room->branch_id}}" />
                    <input name="room_type_id" readonly type="hidden" value="{{$room->id}}" />
                    <input name="roomPrice" readonly type="hidden" id="roomPrice" value="{{$room->price}}" />
                </form>
            </div>
            <div class="card-loading-overlay">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card h-100">
            <div class="card-header p-2 bg-primary">
                <h6 class="card-title mb-0 font-weight-bold text-dark">
                    Your Summary Price
                </h6>
            </div>
            <div class="card-body p-2">
                <div class="d-flex justify-content-between flex-column h-100">
                    <div>
                        <div class="media mb-2 bg-light border">
                            <img src="{{$room->feature_image}}" width="64px" height="64px" class="mr-3">
                            <div class="media-body p-0">
                                <div class="d-flex flex-column">
                                    <p class="text-dark font-weight-bold mb-0">{{$room->name}}</p>
                                    <a href="{{route('hotel.show', [$room->branch->id, $room->branch->name])}}" class="small font-weight-bold">Change your selection</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Price:</p>
                            <p id="ShowRoomPrice" class="text-dark font-weight-bold mb-0"></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Room:</p>
                            <p id="ShowRoomQuantity" class="text-dark font-weight-bold mb-0"></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Length of Stay:</p>
                            <p id="ShowNumberOfStay" class="text-dark font-weight-bold mb-0"></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-top border-primary">
                        <h6 class="text-muted">Total</h6>
                        <h6 id="ShowPrice" class="font-weight-bold text-primary h3"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>