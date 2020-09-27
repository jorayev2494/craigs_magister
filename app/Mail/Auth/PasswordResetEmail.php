<?php

namespace App\Mail\Auth;

use App\Jobs\Interfaces\IQueueNames;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
    * @var string|null $subject
    */
    public $subject;

    /**
    * @var string $resetUrl
    */
    private string $resetUrl;

    /**
    * @var string $email
    */
    public string $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $token, string $userType = 'user')
    {
        $this->subject  = __('email_subjects.forgot_password');
        $this->email    = $email;
        $this->resetUrl = config('app.domain') . "/auth/password_recovery/{$userType}?" . $token;
        $this->onQueue(IQueueNames::EMAILS);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.auth.forgot_password')->with([
                                                                        'email'     => $this->email,
                                                                        'resetUrl'  => $this->resetUrl,
                                                                      ])->subject($this->subject);
    }
}
