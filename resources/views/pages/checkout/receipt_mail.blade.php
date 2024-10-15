<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Attached Invoice</title>
    <style>
    </style>
  </head>
  <body>
    <p>Dear {{$payment->name}},</p>
    <p>
        hope this email finds you well. 
        I'm writing to confirm your hotel booking at 
        <strong>{{$payment->branch->name}}</strong> for <strong>{{$payment->date_from}}</strong> to <strong>{{$payment->date_to}}</strong>.
    </p>
    <p>
    Please find attached a copy of your receipt for your records. 
    If you have any questions or concerns, 
    please do not hesitate to contact me by replying to this email or by <a href="{{route('contact')}}">Click here.</a>
    </p>
    <p>
        Thank you for choosing <strong>{{$payment->branch->name}}</strong> and we look forward to your stay with us.
    </p>
    <p>Best regards,</p>
    <p>TeleTour</p>
  </body>
</html>
