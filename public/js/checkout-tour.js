(function($){
    'use strict'

window.getNumberOfStay = function (checkIn, CheckOut) {
    const date1 = new Date(checkIn);
    const date2 = new Date(CheckOut);
    const timeDiff = Math.abs(date2.getTime() - date1.getTime());
    const totalDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return totalDays;
}

const defaultDateTime = () => {
    const now = new Date();
    const dateInput = document.getElementById('inputDate');
    const today = now.toISOString().split('T')[0];
    dateInput.value = today;
    // const timeInput = document.getElementById('optionTime');
    // const hours = String(now.getHours()).padStart(2, '0');
    // const minutes = String(now.getMinutes()).padStart(2, '0');
    // timeInput.value = "1";
    // var selectElement = document.getElementById('optionTime');
    // var selectedIndex = selectElement.selectedIndex;
    //     var selectedOption = selectElement.options[selectedIndex];
    //     var selectedText = selectedOption.text;
    const elementDate = $('#date_tour');
    // const elementTime = $('#time_tour');
    elementDate.text(dateInput.value);
    // elementTime.text(selectedText);
}

window.calculation = function () {
    defaultDateTime();
    const currency = '$ ';
    const priceSoloQuantity = $('#priceSoloQuantity')
    const priceGroupQuantity = $('#priceGroupQuantity');
    const priceSoloElement = $('#price_solo_tour');
    const priceGroupElement = $('#price_group_tour');
    const inputDate = $('#inputDate');
    const inputTime = $('#optionTime');
    const elementDate = $('#date_tour');
    const elementTime = $('#time_tour');
    const getDate = () => elementDate.text(inputDate.val());
   
    inputDate.on('change', () => getDate());
    inputTime.on('change', (e) => {
        var optionId = e.target.value;
        var selectedOption = e.target.options[e.target.selectedIndex];
        var selectedText = selectedOption.text;
        elementTime.text(selectedText);
    });
    const priceSolo = () => priceSoloQuantity.attr('price') * priceSoloQuantity.val();
    const priceGroup = () => (priceGroupQuantity.attr('price') * priceGroupQuantity.val());
    priceSoloElement.text(`$ ${priceSolo().toFixed(2)}`);
    priceGroupElement.text(`$ ${priceGroup().toFixed(2)}`);
    priceSoloQuantity.on('change',() => priceSoloElement.text(`$ ${priceSolo()}`));
    priceGroupQuantity.on('change',() => priceGroupElement.text(`$ ${priceGroup()}`));
    const getTotalPrice = () => priceSolo() + priceGroup();
    $("#price_tour").text(currency + getTotalPrice().toFixed(2));
}

window.handleSubmitCheckOut = function () {
    window.addEventListener('load', function () {
        let today = moment().format('YYYY-MM-DD');
        let tomorrow = moment(today).add(1, 'day').format('YYYY-MM-DD');
        let startDate = localStorage.getItem('checkoutInDate');
        let endDate = localStorage.getItem('checkoutOutDate');
        if(startDate && endDate) {
            today = startDate;
            tomorrow = endDate;
        }
        $('#check_in_date').val(today);
        $('#check_out_date').val(tomorrow);
        calculation();
        $('#input-filter-date').daterangepicker({
            locale: { format: 'YYYY-MM-DD' },
            minDate: moment(),
            "autoApply": true,
            "opens": "center",
            "singleDatePicker": false,
            "showDropdowns": false,
            "showWeekNumbers": false,
            "showISOWeekNumbers": true,
            "startDate": today,
            "endDate": tomorrow,
        }).on('apply.daterangepicker', function(ev, picker) {
            localStorage.setItem('checkoutInDate', picker.startDate.format('YYYY-MM-DD'));
            localStorage.setItem('checkoutOutDate', picker.endDate.format('YYYY-MM-DD'));
            $('#check_in_date').val(picker.startDate.format('YYYY-MM-DD'));
            $('#check_out_date').val(picker.endDate.format('YYYY-MM-DD'));
            calculation();
        });
        calculation();
        const forms = document.getElementsByClassName('form_checkout');
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('change', calculation);
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                event.stopPropagation();
                if (form.checkValidity() === false) {
                    form.classList.add('was-validated');
                }
                if (form.checkValidity() === true) {
                    event.preventDefault();
                    const formData = $(this).serializeArray();
                    const data = formData.reduce((object, item) => {
                        object[item.name] = item.value;
                        return object;
                    }, {});
                    $('.card-loading-overlay').addClass('d-block');
                    ajax(form.getAttribute('action'), { method: 'POST', data }).then(({ success, urlRedirect }) => {
                        setTimeout(() => {
                            if (success) {
                                window.location.href = urlRedirect;
                            } else {
                                $('.card-loading-overlay').removeClass('d-block');
                                alert('Something went wrong.');
                            }
                            $('.card-loading-overlay').removeClass('d-block');
                        }, 3000);
                    }).catch((error) => {
                        $('.card-loading-overlay').removeClass('d-block');
                        alert('Something went wrong.');
                    })
                }
            }, false);
        });
    }, false);
};

window.handleAbaForm = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const tran_id = urlParams.get('tran_id');
    const payment = {
        'cards':'Credit/Debit Card',
        'abapay_khqr':'ABA KHQR',
    }
    if (tran_id) {
        ajax(`/checkoutSite/payment/${tran_id}`)
            .then((data) => {
                const { hashData, hash } = data;
                const form = $('#aba_merchant_request');
                Object.keys(hashData).map((name) => form.append((`<input type='hidden' name='${name}' value='${hashData[name]}' />`)));
                form.append((`<input type='hidden' name='hash' value='${hash}' />`));
                const price = data.tour_package.price * data.quantity;
                $("#invoice_price").text(199);
                $("#invoice_name").text(data.name);
                $("#invoice_email").text(data.email);
                $("#invoice_site_name").text(data.branch.name);
                $("#invoice_tour_name").text(data.tour_type.name);
                $("#invoice_package_name").text(data.tour_package.name);
                $("#invoice_quantity").text(data.quantity);
                $("#invoice_time").text(data.select_time);
                $("#invoice_date").text(data.select_date);
                $("#invoice_pickup").text(data.pick_location || 'No');
                $("#invoice_payment_option").text(payment[data.payment_option]);
                $("#invoice_price").text('$ ' + parseInt(price).toFixed(2));
                $("#invoice_req_time").val(data.req_time);
                $("#invoice_tran_id").val(data.tran_id);
                localStorage.setItem('hashData', JSON.stringify(hashData));
            })
            .catch(console.log)
    }
}

window.handleSendReceipt = function(tran_id){
    ajax(`/checkoutSite/payment/receipt/${tran_id}`, { method: 'post' });
}

window.handleStatusApprovedScreen = function(){
    const hashData = localStorage.getItem('hashData');
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    if(hashData && status === 'approved'){
        const { tran_id, req_time } = JSON.parse(hashData);
        ajax(`/checkout/payment/status`, {
            method: 'post',
            data: { tran_id, req_time }
        })
        .then(({ payment_status }) => {
            if(payment_status === "APPROVED"){
                return;
            } else {
                $('.completed-animation').empty();
                $('.completed-animation').html(`
                <div class='alert alert-danger'>
                    <strong>Ooop!</strong><span class='ml-2'>We are sorry, something went wrong!</span>
                    <h5 class='small'>Please contact us.</h5>
                </div>
                `);
            }
        })
        .catch(console.log)
    }
}


function getHeaders({ headers = {} }) {
    return {
        ...headers,
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
}

function getProps(props = {}) {
    return {
        method: 'GET',
        responseType: 'json',
        ...props,
    };
}

function ajax(url, pProps = {}) {
    const props = getProps({
        ...pProps,
        url,
        headers: getHeaders(pProps),
    });

    return axios(props).then(({ data }) => data);
}
})(jQuery);

handleSubmitCheckOut();
handleStatusApprovedScreen();
const button = $('#checkout_button');
handleAbaForm();
button.click(function() {
    AbaPayway.checkout();
});