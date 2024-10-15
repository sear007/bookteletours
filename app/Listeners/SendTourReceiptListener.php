<?php

namespace App\Listeners;

use App\Mail\TourReceiptMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTourReceiptListener implements ShouldQueue
{
    public function handle($event)
    {
      Mail::to($event->payment->email)->send(new TourReceiptMail($event->payment));
    }
}
