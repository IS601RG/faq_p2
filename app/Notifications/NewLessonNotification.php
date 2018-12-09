<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLessonNotification extends Notification
{
    use Queueable;
    protected $lesson;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Lesson, $lesson)
    {
        //
        $this->lesson=$lesson;
    }

    public function toDatabase($notifiable)
    {
        return [
            //
            'lesson' => $this->lesson,
        ];
    }
}
