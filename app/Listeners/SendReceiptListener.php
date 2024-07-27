<?php

namespace App\Listeners;

use App\Mail\ReceiptMail;
use Illuminate\Support\Facades\Mail;

class SendReceiptListener
{
    public function handle($event)
    {
        Mail::to($event->payment->email)->send(new ReceiptMail($event->payment));
    }
}
