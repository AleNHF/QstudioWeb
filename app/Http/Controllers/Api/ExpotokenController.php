<?php

namespace App\Http\Controllers\Api;

use App\Models\Expotoken;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpoTokenController extends BaseController
{
    /**
     * TODO: This is for register the token for tutor and children
     */
    public function registerExpotoken(Request $request)
    {
        $existToken = Expotoken::where('expo_token', $request->expo_token)->first();

        if (!$existToken) {
            $register = Expotoken::create([
                'expo_token' => $request->expo_token,
                'user_id' => $request->user_id,
            ]);

            return $this->sendResponse($register, "Token was registered.");
        } else {
            return $this->sendError("Token exists.");
        }
    }

    /**
     * TODO: This is for delete tokens
     */
    public function deleteExpotoken()
    {
        $expoToken = Expotoken::find(auth()->user()->id->expotokens->first());
        $expoToken->delete();

        return $this->sendError('No Content.', 204);
    }

    /**
     * TODO: This is for show all notifications
     */
    public function allNotifications()
    {
        $user = Auth::user();

        if ($user->type == 'T') {
            $notifications = $user->notifications;
            return $this->sendResponse($notifications, "Notifications List.");
        }
    }   

    /**
     * TODO: This is for show the unread notifications
     */
    public function unReadNotification()
    {
        $user = Auth::user();

        if ($user->type == 'T') {
            $notifications = $user->unReadNotification;

            return $this->sendResponse($notifications, "Unread Notifications List.");
        }
    }

    /**
     * TODO: This is for show read notifications
     */
    public function readNotification()
    {

    }

    /**
     * TODO: This is for send the register token
     */
    public function sendToken(Request $request)
    {
        //$user_id = User::find(Auth::user()->id);
        //$tutor_id = Tutor::where('user_id', $user_id)->first()->id;
        $actualDate = Carbon::now()->setTimezone('America/La_Paz');

        $token = new Token();
        $token->code = $request->token_register;
        $token->createDate = $actualDate;
        $token->status = 0;
        $token->children_id = $request->children_id;
        $token->save();

        return $this->sendResponse($token, "Token sent");
    }

    /**
     * TODO: This is for register the token into the children app
     */
    public function registerTokenLogin(Request $request)
    {
        try {
            $actualDate = Carbon::now()->setTimezone('America/La_Paz');
            $token = Token::where('code', $request->token)->where('status', 0)->first();

            if ($token == '') {
                if ($token = Token::where('code', $request->token)->where('status', 1)->exists()) {
                    return $this->sendError('Token registered!');
                }
                //return $this->sendError('Token not found');
            }

            $token->status = 1;
            $token->registerDate = $actualDate;
            $token->save();

            $result = [
                'data' => $token,
                'child_id' => $token->children_id
            ];

            return $this->sendResponse($result, "Token registered successfully.");
        } catch (\Throwable $th) {
            return $this->sendError('Token not found', 404);
        }
    }
}