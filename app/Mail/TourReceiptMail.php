<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Mpdf\Mpdf;

class TourReceiptMail extends Mailable
{
    use Queueable, SerializesModels;
    public $payment;
    private $filename;
    private $path;
    public function __construct($payment)
    {
      $this->payment = $payment;
        $view = view('pages.tours.invoice', compact('payment'));
        $pdf = new Mpdf([
            'mode' => 'UTF-8',
            'format' => 'A4-P',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 5,
            'margin_footer' => 5,
        ]);
      $pdf->WriteHTML($view);
      $this->filename = 'receipt-tour-'.time().'.pdf';
      $this->path = 'pdf/receipt/';
      $pdf->OutputFile($this->path.$this->filename);
    }
    
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('bookteletours@gmail.com', 'TeleTours'),
            subject: 'Tour Booking Receipt and Confirmation',
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
          view: 'pages.tours.mail_html',
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
