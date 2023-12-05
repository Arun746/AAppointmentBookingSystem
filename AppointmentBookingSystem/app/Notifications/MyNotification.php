<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyNotification extends Notification
{
    use Queueable;

    public $user;
    public $action;
    /**
     * Create a new notification instance.
     *
     * @param mixed $user
     */
    public function __construct($user, $action)
    {
        $this->user = isset($user->fname) ? $user->fname : 'User';
        $this->action = $action;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toArray(object $notifiable): array
    {
        $action = $this->action;

        $message = '';

        switch ($action) {
            case 'password_reset':
                $message = 'Password reset done for ' . $this->user;
                break;
            case 'edit_user':
                $message =  $this->user . ' details was updated' ;
                break;
            // Add more cases for other actions as needed
            default:
                $message = 'Default message';
                break;
        }
        return [
           'data'=>$message,
        ];
    }
}
