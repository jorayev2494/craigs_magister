<?php

namespace App\Mail\Announcement;

use App\Jobs\Interfaces\IQueueNames;
use App\Models\Announcements\Base\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatorSendMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
    * @var Announcement $announcement
    */
    public Announcement $announcement;

    /**
    * @var array $data
    */
    public array $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, Announcement $announcement)
    {
        $this->data = $data;
        $this->announcement = $announcement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('emails.announcement.creator_send_message')->with([
            'data' => $this->data,
            'announcement' => $this->announcement
        ])->onQueue(IQueueNames::EMAILS);
    }
}
