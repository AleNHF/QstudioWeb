<?php

namespace App\Http\Controllers\Api;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Storage;
use Validator;

class AuthController extends BaseController
{
    /**
     * This endpoint is for login into the tutor app 
     * Required:
     *      email, password
     */
    public function login(Request $request)
    {
        // start validatons
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255,email',
            'password' => 'required|min:8',
        ]);
        $validator->setCustomMessages([
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser un correo electronico',
            'password.required' => 'La contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('Validation Error.', ['email' => 'Correo electrónico no registrado.']);
            }
            return $this->sendError('Unauthorized', ['password' => 'La contraseña es errónea']);
        }
        // end validations

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $result = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ];

        return $this->sendResponse($result, 'You have successfully log in');
    }

    /**
     * This endpoint is for get profile of user tutor into the tutor app
     */

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        $tutor = Tutor::where(['user_id' => $user->id])->first();
         
        if ($user == null ) {
            return $this->sendError('Unauthorized.', 401);
        }

        $result = [
            'user' => $user,
            'tutor' => $tutor
        ];

        return $this->sendResponse($result, 'Success');
    }

    /**
     * This endpoint is for logout into the tutor app
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $result = $request->user();

        return $this->sendResponse($result, "You have successfully logout");
    }

    /**
     * This is for register users
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthDay' => 'required|date',
            'phoneNumber' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        if ($request->hasFile('foto')) {
            $folder = "public/profiles";
            $profile = $request->file('profilePhoto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($profile);
        } else {
            $url = null;
        }
        
        Tutor::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'birthDay' => $input['birthDay'],
            'phoneNumber' => $input['phoneNumber'],
            'profilePhoto' => $url,
            'user_id' => $user->id
        ]);
        
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}