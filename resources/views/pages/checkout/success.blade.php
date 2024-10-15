<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card my-3">
            <card class="card-body">
            <div x-show="step == 4" class="completed-animation">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
            </svg>
            <p class="success">Thank you!</p>
            <div class="alert alert-success">
                <strong>You've successful paid the payment. </strong>
                <h5 class="small font-weight-bodl">We sent the receipt to your email.</h5>
                <a href="{{route('dashboard')}}">Go to Dashboard</a>
            </div>
        </div>
            </card>
        </div>
    </div>
</div>