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
      I hope this email finds you well. I'm writing to let you know that I've attached your invoice to this email.
    </p>
    <p>
      Please take a moment to review the invoice and let me know if you have any questions or concerns. 
      You can contact us by replying to this email or by <a href="{{route('contact')}}">Click here.</a>
    </p>
    <p>
      Thank you for your business and I look forward to hearing from you soon.
    </p>
    <p>Best regards,</p>
    <p>TeleTour</p>
  </body>
</html>
