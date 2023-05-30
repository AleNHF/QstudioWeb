<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PushNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::all()->except($event->content->user_id)
            ->each(function (User $user) use ($event) {
                Notification::send($user, new PushNotification($event->content));
                if (count($user->expotokens) > 0) {
                    $recipient = $user->expotokens[0]->expo_token;
                    // You can quickly bootup an expo instance
                    $expo = \ExponentPhpSDK\Expo::normalSetup();
                    // Subscribe the recipient to the server
                    $expo->subscribe('canal', $recipient);
                    // Build the notification data

                    $notification = ['body' => $event->content->name];
                    // Notify an interest with a notification
                    $expo->notify(['canal'], $notification);
                }
            });
    }
}
