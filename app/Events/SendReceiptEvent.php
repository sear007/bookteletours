<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendReceiptEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $payment;
    public function __construct($payment)
    {
        $this->payment = $payment;
    }
}
