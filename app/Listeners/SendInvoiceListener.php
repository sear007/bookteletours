<?php

namespace App\Listeners;

use App\Mail\InvoiceMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoiceListener implements ShouldQueue
{
    public function handle($event)
    {
        Mail::to($event->payment->email)->send(new InvoiceMail($event->payment));
    }
}
