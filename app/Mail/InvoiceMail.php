<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Mpdf\Mpdf;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $payment;
    private $filename;
    private $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
        $pdf = new Mpdf([
            'mode' => 'UTF-8',
            'format'=> 'A4-P',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);
        $pdf->WriteHTML(view('pages.checkout.invoice', compact('payment', 'payment')));
        $this->filename = 'invoice-'.time().'.pdf';
        $this->path = 'pdf/invoice/';
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
            subject: 'Invoice Order',
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
            view: 'pages.checkout.invoice_mail',
            with: [
                'payment' => $this->payment
            ]
        );
    }

    public function attachments()
    {
        return [
            Attachment::fromPath($this->path.$this->filename)
                ->as($this->filename)
                ->withMime('application/pdf'),
        ];
    }
}
