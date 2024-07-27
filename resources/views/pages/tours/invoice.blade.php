<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            gap: 10px;
        }
        p{
          font-size: 12px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        .no-border td {
            border-color: #fff;
        }
        .header-logo img {
            width: 120px;
            height: 120px;
        }
        .receipt-info h5, .receipt-info p {
            margin: 0;
        }
        .highlight-table {
            width: 100%;
            background: #fff0c3;
            margin-bottom: 10px;
            padding: 10px;
        }
        .highlight-table td {
            vertical-align: top;
        }
        .highlight-table td.text-right {
            text-align: right;
        }
        .footer-info {
            padding: 5px;
            background: #ccc;
            font-size: 12px;
        }
        .footer-info ul {
            margin: 0;
            padding-left: 20px;
        }
        .footer-contact {
            text-align: right;
            background: #ccc;
            padding: 5px;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <table class="table no-border" style="border: 0" border="0">
                <tbody>
                    <tr>
                        <td style="width: 70%;">
                            <div class="header-logo">
                                <img width="120" height="120" src="{{ public_path() . '/images/logo.png' }}" alt="Company Logo" />
                            </div>
                        </td>
                        <td class="receipt-info">
                            <h5 class="font-weight-bold">RECEIPT</h5>
                            <p>Tours Activity</p>
                            <p>Order ID: {{ $payment->tran_id }}</p>
                            <p>{{ $payment->tour->name }}</p>
                            <p>Date: {{ $payment->date }}</p>
                            <p>Time: {{ $payment->time }}</p>
                            <p>{{ $payment->tourType->name }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="highlight-table">
                <tr>
                    <td rowspan="3">Your order confirmed</td>
                    <td class="text-right"><strong>{{ price($payment->price) }}</strong></td>
                </tr>
                <tr>
                    <td class="text-right">
                        <small>{{ $payment->payment_status === 'APPROVED' ? 'Paid by '.$payment->name : 'Not Paid' }}</small>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Tour Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Solo Price</th>
                        <th>Group Price</th>
                        <th>Discount</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $payment->tour->name }}</td>
                        <td>{{ $payment->tourType->name }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->time }}</td>
                        <td>{{ price($payment->price_solo) }} x {{$payment->quantity_solo}}</td>
                        <td>{{ price($payment->price_group) }} x {{$payment->quantity_group}}</td>
                        <td>0%</td>
                        <td>{{ price($payment->price) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6" rowspan="3">
                            <p>Request: Need pick-up service at Unique Private Villa, Bakheang Road</p>
                            <p>Note: We will pick up from the hotel at half an hour prior to departure time to our office</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"><p class="m-0">Sub Total</p></td>
                        <td>{{ price($payment->price) }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><p class="m-0">Total</p></td>
                        <td>{{ price($payment->price) }}</td>
                    </tr>
                </tbody>
            </table>
            @if ($payment->tourType->tour_includes)
                <p style="font-weight: bold; margin-bottom: 5px">Tour Includes</p>
                <p>{{$payment->tourType->tour_includes}}</p><br>
            @endif
            @if ($payment->tourType->tour_includes_kh)
                <p style="font-weight: bold; margin-bottom: 5px">ដំណើរកំម្សានរួមគ្នា</p>
                <p>{{$payment->tourType->tour_includes_kh}}</p>
            @endif
        </div>
    </div>


    <div style="position: fixed; bottom: 0; left: 0; width: 100%">
      <div class="footer-info">
          <p style="font-weight: bold">Cancellations will be charged as follows</p>
          <ul>
              <li>More than 30 days prior to trip departure: No charge, however the deposit is non-refundable.</li>
              <li>16-29 days prior to departure date: 30% charge on top of the total amount</li>
              <li>8-15 days prior to departure date: 50% charge on top of the total amount</li>
              <li>Less than 7 days prior to departure date: 100% charge</li>
              <li>No-Show: 100% of total charge</li>
          </ul>
      </div>
      <p>Siem Reap Office: Address: #007, Bakheng Road, Svay Dangkhum, Siem Reap, Cambodia.</p>
      <p>BookTeleTours Hot line +855 10 766 971</p>
      <p>Telegram: +855 10 766 971</p>
      <p>Email: bookteletours@gmail.com</p>
      <p>Website: www.bookteletours.com</p>
      <div class="footer-contact"><strong>www.bookteletour.com</strong></div>
  </div>
</body>
</html>
