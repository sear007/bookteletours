<div x-data="reservation" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="modal-reservation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0 position-relative">
                @include('branch.layouts.stepper')
                <button type="button" @click="reset" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body position-relative">
                <div class="d-block justify-content-between mb-3 font-weight-bold">
                    <h5 class="text-primary m-0 branch_name"></h5>
                    <h5 class="badge badge-info room_type_name"></h5>
                </div>
                <div x-show="step == 1" class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-sm date">
                    <input type="hidden" id="search_checkin" class="form-control">
                    <input type="hidden" id="search_checkout" class="form-control">
                </div>
                <div x-show="step == 2" class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-bed"></i></span>
                    </div>
                    <input id="num_rooms" min="1" value="1" type="number" class="form-control form-control-sm">
                </div>
                <div x-show="step == 2" class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <input id="guest_number" min="1" value="1" type="number" class="form-control form-control-sm">
                </div>
                <div x-show="step == 3" class="">
                    <h5>Choose Payment....</h5>
                    <button @click="submit">Submit</button>
                </div>
                <div x-show="step == 4" class="completed-animation">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                        <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                    </svg>
                    <p class="success">Reservation Completed!</p>
                </div>
                
                <table class="table table-sm my-3 small table-bordered text-muted">
                    <tbody>
                        <tr>
                            <td>Check In:</td>
                            <td><span class="check_in"></span></td>
                        </tr>
                        <tr>
                            <td>Check Out:</td>
                            <td><span class="check_out"></span></td>
                        </tr>
                        <tr>
                            <td>Unit Room:</td>
                            <td><span class="num_rooms"></span></td>
                        </tr>
                        <tr>
                            <td>Guests:</td>
                            <td><span class="guest_number"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer p-2">
                <div x-show="step != 4" class="btn-group w-100">
                    <button :disabled="checkPrevDisable" @click="prevStep" id="btn-reservation-back" type="button" class="btn-sm btn btn-dark">Back</button>
                    <button :disabled="checkNextDisable" @click="nextStep" id="btn-reservation-next" type="button" class="btn-sm btn btn-primary">Next</button>
                </div>
                <a x-show="step == 4" href="{{route('dashboard')}}" class="btn-sm btn btn-success btn-block">My Booking List</a>
            </div>
            <div x-show="isLoading == true" class="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>