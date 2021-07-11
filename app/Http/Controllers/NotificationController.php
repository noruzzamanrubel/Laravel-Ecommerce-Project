<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OffersNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $user = User::first();
        $notification = [
            'body' => 'You receive a new notification',
            'notificationText' => 'Your are allow to receive notification',
            'url' => url('/'),
            'thankYou' => 'thanks',
        ];

        $user->notify(new OffersNotification($notification));
    }
}
