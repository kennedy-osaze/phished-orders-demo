<?php

namespace App\Mail;

use App\Models\OrderReply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Symfony\Component\Mime\Email;

class ReplyOrder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public OrderReply $reply)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->withSymfonyMessage(function (Email $message) {
            $message->getHeaders()->addTextHeader('In-Reply-To', $this->reply->order->message_id);
        });

        return $this->view('emails.orders.reply', ['reply' => $this->reply])
            ->subject($this->getSubject())
            ->replyTo(config('mail.order_to.address'), config('app.name'));
    }

    private function getSubject(): string
    {
        return Str::startsWith($this->reply->order->subject, 'Re: ')
            ? $this->reply->order->subject
            : 'Re: '.$this->reply->order->subject;
    }
}
