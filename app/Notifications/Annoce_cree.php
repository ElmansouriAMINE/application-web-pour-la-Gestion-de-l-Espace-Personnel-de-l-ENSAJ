<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class Annoce_cree extends Notification
{
    use Queueable;

    protected $annonce;

    
    public function __construct(Annonce $annonce)
    {
        $this->annonce=$annonce;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toArray($notifiable)
    {
        return [
            'data' => "Nous avons une nouvelle Annonce ".$this->annonce->titre ."Ajoutée par :".Auth::user()->name
        ];
    }

}
