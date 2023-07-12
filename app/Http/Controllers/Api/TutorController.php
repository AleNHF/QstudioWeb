<?php

namespace App\Http\Controllers\Api;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\BaseController as BaseController;
use Carbon\Carbon;

class TutorController extends BaseController
{
    /**
     * This endpoint is for update profile of user tutor
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $tutor = Tutor::where(['user_id' => $user->id])->first();

        if ($user == null) {
            return $this->sendError('Unauthorized.', 401);
        }

        $input = $request->all();

        if ($user->type == "T") {
            $url = null;

            if ($request->hasFile('profilePhoto')) {
                $folder = "public/profiles";
                //If the user enters, it is to update their profile photo, deleting the one they had
                if ($tutor->profilePhoto != null) {
                    Storage::delete($tutor->profilePhoto);
                }
                $imagen = $request->file('profilePhoto')->store($folder);
                $url = Storage::url($imagen);
            } else {
                $url = 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png';
            }

            if (isset($input['password'])) {
                $inputPassword = $input['password'];
                $storedPassword = $user->password;

                if (!password_verify($inputPassword, $storedPassword)) {
                    return $this->sendResponse($user, 'The password is the same to old password.');
                } 

                $user->password = bcrypt($input['password']);
            }

            $user->name = $input['name'];
            $user->email = $input['email'];           
            $user->save();

            $tutor->name = $input['name'];
            $tutor->lastname = $input['lastname'];
            $tutor->birthDay = $input['birthDay'];
            $tutor->phoneNumber = $input['phoneNumber'];
            $tutor->profilePhoto = $url;
            $tutor->save();

            $result = [
                'user' => $user,
                'tutor' => $tutor
            ];

            return $this->sendResponse($result, "You have successfully updates your profile.");
        } else {
            return $this->sendError("Forbidden.", 403);
        }
    }

    /**
     * This endpoint is for get children of a tutor
     */
    public function getChildren()
    {
        $user = User::find(Auth::user()->id);
        $tutor = Tutor::where(['user_id' => $user->id])->first();

        $children = $tutor->children;
        $countChildren = $children->count();

        $result = [
            'totalRecords' => $countChildren,
            $children,
        ];

        if ($children != null) {
            // Agregar el campo 'edad' a cada elemento en la colección
            foreach ($children as $child) {
                $fechaNacimiento = Carbon::parse($child->birthDay);
                $child->age = $fechaNacimiento->diffInYears(Carbon::now());
            }

            return $this->sendResponse($result, "This is a list of your children");
        } else {
            return $this->sendError('No Content.', 204);
        }
    }
}