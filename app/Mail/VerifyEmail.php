<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Markdown;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $otp;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user,$otp)
    {
        $this->user = $user;
        $this->otp = $otp;

        $this->to($user->email);
        $this->subject('Verify Your email');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Email',
        );
    }

    public function build()
    {
        $otp = $this->otp;
        $markdown = new Markdown(view(),config('mail.markdown'));

        return $this->view(
            'verify',
            compact('otp')
        )->with('text','Your OTP'. $otp);
    }

}