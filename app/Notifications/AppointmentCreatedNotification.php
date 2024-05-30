<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCreatedNotification extends Notification
{
    use Queueable;
    public $appointment;
    public $patient;
    public $method;
    /**
     * Create a new notification instance.
     */
    public function __construct($appointment, $patient, $method)
    {
        $this->appointment = $appointment;
        $this->patient = $patient;
        $this->method = $method;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable)
    {
        return [
            'time_interval' => $this->appointment->time_interval,
            'message' => 'New appointment created by ' . $this->patient->fullname,
            'patient_id' => $this->patient->id,
            'method' => $this->method
        ];
    }
}
