<?php

namespace App\Http\Controllers\Api;

use App\Models\Children;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChildrenController extends BaseController
{
    /**
     * This endpoint is for add children into the app tutor
     */
    public function storageContacto(Request $request)
    {


        $constact = $request->contactos;
        $number = $request->number;


        foreach ($constact as  $constactos) {

            $guardar = new Conctact();
            $guardar->name = $constactos;
            foreach ($number as  $numbers) {

                $guardar->phoneNumber = $numbers;
            }

            $guardar->children_id = $request->id_hijo;
            $guardar->save();
        }


        return response()->json([
            'message' => "Contacto subida",
            'data' =>  "constact",
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthDay' => 'required|date',
            'gender' => 'required|string|max:1',
            'alias' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();

        $user = User::find(Auth::user()->id);
        $tutor = Tutor::where(['user_id' => $user->id])->first();

        if ($request->hasFile('profilePhoto')) {
            $folder = "public/children";
            $profile = $request->file('profilePhoto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($profile);
        } else {
            $url = $request->gender == 'F' ?
                'https://cdn.icon-icons.com/icons2/1736/PNG/512/4043252-child-girl-kid-person_113255.png' :
                'https://cdn.icon-icons.com/icons2/1736/PNG/512/4043235-afro-boy-child-kid_113264.png';
        }

        $kid = Children::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'alias' => $input['alias'],
            'gender' => $input['gender'],
            'birthDay' => $input['birthDay'],
            'profilePhoto' => $url,
            'tutor_id' => $tutor->id
        ]);

        return $this->sendResponse($kid, "You have registered your kid successfully.");
    }
}
