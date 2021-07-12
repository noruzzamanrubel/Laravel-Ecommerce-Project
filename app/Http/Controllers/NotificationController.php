<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OffersNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::first();
            $notification = [
                'greeting' => 'Hello From Rubel',
                'body' => 'You receive a new notification',
                'notificationText' => 'Confirm SignUp',
                'url' => url('/'),
                'thankYou' => 'thanks',
            ];

            $delay = now()->addMinutes(5);

            $user->notify((new OffersNotification($notification))->delay($delay));
        }
    }

    public function sendSmsNotificaition()
    {
        $basic = new \Nexmo\Client\Credentials\Basic('Nexmo key', 'Nexmo secret');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '+8801737779430',
            'from' => 'John Doe',
            'text' => 'A simple hello message sent from Vonage SMS API',
        ]);

        dd('SMS message has been delivered.');
    }
}
