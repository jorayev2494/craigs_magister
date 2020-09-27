<?php

namespace App\Mail\Auth;

use App\Jobs\Interfaces\IQueueNames;
use App\Models\EmailConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $subject;
    
    public string $confirmationUrl;
    
    public string $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailConfirmation $emailConfirm, Model $user, string $userType)
    {
        $this->subject  = __('email_subjects.welcome');
        $this->email    = $user->email;
        $this->confirmationUrl = config('app.domain') . "/auth/login/{$userType}?" . $emailConfirm->token;
        $this->onQueue(IQueueNames::EMAILS);                
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.auth.registration')->subject($this->subject);
    }
}
