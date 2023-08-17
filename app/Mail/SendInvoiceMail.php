<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $invoice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->invoice;
        $pdf = PDF::loadView('backend.admin.invoice.invoice',compact('order'));

        return $this->subject("Invoice No.". $order->invoice_number)
            ->view('backend.admin.invoice.invoice',compact('order'))
            ->attachData($pdf->output(),$order->invoice_number.".pdf");
    }
}
