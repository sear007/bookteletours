<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Mpdf\Mpdf;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    private $filename;
    private $path;
    public function __construct($payment)
    {
        $this->payment = $payment;
        $pdf = new Mpdf([
            'mode' => 'UTF-8',
            'format'=> 'A4-P',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);
        $pdf->WriteHTML(view('pages.checkout.receipt', compact('payment', 'payment')));
        $this->filename = 'receipt-'.time().'.pdf';
        $this->path = 'pdf/receipt/';
        $pdf->OutputFile($this->path.$this->filename);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('bookteletours@gmail.com', 'TeleTours'),
            subject: 'Hotel Booking Receipt and Confirmation',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'pages.checkout.receipt_mail',
            with: [
                'payment' => $this->payment
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath($this->path.$this->filename)
                ->as($this->filename)
                ->withMime('application/pdf'),
        ];
    }
}
