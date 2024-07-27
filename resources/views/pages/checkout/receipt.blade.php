<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
</head>

<body>
    <div class="container-fluid" >
        <table class="table" style="border: none;">
            <tbody>
                <tr>
                    <td style="border-color: transparent; width: 70%">
                        <img width="120" height="120" src="{{public_path().'/images/logo.png'}}" />
                    </td>
                    <td style="border-color: transparent; text-align: left">
                        <h5 class="m-0 text-dark font-weight-bold">RECEIPT</h5>
                        <p class="m-0 text-dark small">Date: {{$payment->modfied}}</p>
                        <p class="m-0 text-dark small">Order ID: {{$payment->code}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; background: #fff0c3; margin-bottom: 20px; padding: 20px;">
            <tr>
                <td style="vertical-align: top" rowspan="3">Your order confirmed</td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>{{price($payment->price)}}</strong></td>
            </tr>
            <tr>
                <td style="text-align: right"><small>Paid by {{$payment->name}}</small></td>
            </tr>
        </table>
        <div class="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Quantity Room</th>
                        <th>Length of stay</th>
                        <th>Rate</th>
                        <th>Discount</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="mb-0 h6 font-weight-bold">{{$payment->branch ? $payment->branch->name : ''}}</p>
                            <p class="mb-0 text-muted font-weight-bold">{{$payment->roomType ?
                                $payment->roomType->name : ''}}</p>
                        </td>
                        <td>{{$payment->num_rooms}}</td>
                        <td>{{displayQuantityDay($payment->qauntity)}}</td>
                        <td>{{$payment->roomType ? price($payment->roomType->price) : ''}}</td>
                        <td>0%</td>
                        <td>{{price($payment->price)}}</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="5">
                            <p class="m-0 text-dark">Sub Total</p>
                        </td>
                        <td>{{price($payment->price)}}</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="5">
                            <p class="m-0 text-dark">Total</p>
                        </td>
                        <td>{{price($payment->price)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div
        style="position: fixed; bottom: 0; left: 0; width: 100%; padding: 5px; text-align: right; background: #ccc; font-size: 11px;">
        <div><strong>www.bookteletour.com</strong></div>
    </div>
    <style>
        .container-fluid {
            width: '100%';
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .text-muted {
            color: #6c757d;
        }

        .text-right {
            text-align: right
        }

        .small {
            font-size: 0.875rem;
        }

        .font-weight-bold {
            font-weight: bold
        }

        .font-weight-bold {
            font-weight: bold
        }

        .text-dark {
            color: #000 !important
        }

        .m-0 {
            margin: 0 !important
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Optional hover effect */
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</body>

</html>