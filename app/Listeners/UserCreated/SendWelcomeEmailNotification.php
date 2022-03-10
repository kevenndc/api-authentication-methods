<?php

namespace App\Listeners\UserCreated;

use App\Events\UserCreated;
use App\Mail\User\Welcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\SentMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 3;

    public function handle(UserCreated $event): SentMessage
    {
        $user = $event->user;
        $token = $user->createToken('api')->plainTextToken;

        return Mail::send(new Welcome($user, $token));
    }
}
