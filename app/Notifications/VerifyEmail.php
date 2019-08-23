<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends BaseVerifyEmail
{
    protected function verificationUrl($notifiable)
    {
        $prefix = env('APP_CLIENT_URL') . '/verify-email?queryURL=';
        $temporarySigned = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['id' => $notifiable->getKey()]
        );
        return $prefix . urlencode($temporarySigned);
    }
}
