<?php

namespace App\Listeners;

use App\Models\Children;
use App\Models\User;
use App\Notifications\ContentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Pusher\Pusher;

class ContentNotificationListener
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
        // TODO: Array for content names
        $nameData = array(
            'Nudity'=>'Desnudez',
            'Graphic Male Nudity'=>'Desnudez Masculina Gráfica',
            'Graphic Female Nudity'=>'Desnudez Femenina Gráfica',
            'Sexual Activity'=>'Actividad Sexual',
            'Illustrated Explicit Nudity'=>'Desnudez explícita ilustrada',
            'Adult Toys'=>'Juguetes para adultos',
            'Female Swimwear Or Underwear'=>'Ropa interior femenino',
            'Male Swimwear Or Underwear'=>'Ropa interior masculino',
            'Partial Nudity'=>'Desnudez parcial',
            'Barechested Male'=>'Hombre con el torso desnudo',
            'Revealing Clothes'=>'Atuendo revelador',
            'Sexual Situations'=>'Situaciones Sexuales',
            'Graphic Violence Or Gore'=>'Violencia Gráfica O Gore',
            'Physical Violence'=>'Violencia física',
            'Weapon Violence'=>'Violencia con Armas',
            'Weapons'=>'Armas',
            'Self Injury'=>'Auto lastimarse',
            'Emaciated Bodies'=>'Cuerpos demacrados',
            'Corpses'=>'Cadáveres',
            'Hanging'=>'Ahorcamiento',
            'Air Crash'=>'Accidente aéreo',
            'Explosions And Blasts'=>'Explosiones y Bombardeos',
            'Middle Finger'=>'Dedo del medio',
            'Drug Products'=>'Productos farmacéuticos',
            'Drug Use'=>'Consumo de drogas',
            'Pills'=>'Pastillas',
            'Drug Paraphernalia'=>'Parafernalia de drogas',
            'Tobacco Products'=>'Productos de tabaco',
            'Smoking'=>'Fumar',
            'Drinking'=>'Bebiendo',
            'Alcoholic Beverages'=>'Bebidas alcohólicas',
            'Gambling'=>'Apuestas',
            'Nazi Party'=>'Fiesta nazi',
            'White Supremacy'=>'Supremacía blanca',
            'Extremist'=>'Extremista',
        );

        $user = User::find($event->user['id']);
        $kid = Children::find($event->content['children_id']);
        Notification::send($user, new ContentNotification($event->content));
        $data = [
            "contentData" => $event->content->contentData,
            "type" => $event->content->type,
            "children_id" => $kid->name,
            'path' => $event->content->url
        ];

        //if (count($user->expotokens) > 0) {
            $recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => true,
                ]
            );

            $pusher->trigger('canal', 'notification', [
                'body' => "Tu hij@ está mirando " . $nameData[$event->content->contentData],
                'title' => 'Qstodio',
                'data' => $data
            ]);

            // FIREBASE
            fcm()
            ->to($recipients)
            ->priority('high')
            ->timeToLive(0)
            ->notifications([
                'title' => 'Qstodio',
                'body' => "Tu hij@ está mirando " . $nameData[$event->content->contentData],
            ])
            ->send();
        

            // You can quickly bootup an expo instance
            /* $expo = \ExponentPhpSDK\Expo::normalSetup();
            // Subscribe the recipient to the server
            $expo->subscribe('canal', $recipient);
            // Build the notification data
            $notification = [
                'body' =>"Tu hij@ está mirando ".$nameData[$event->content->contentData], 
                'title' => 'Qstodio', 
                'ttl' => 60, 
                'Sound' => 'Default',
                'priority'=>'high',
                'data'=>$data
            ];
            // Notify an interest with a notification
            $expo->notify(['canal'], $notification); */
        //}
    }
}
