<?php

namespace App\Http\Controllers\Api;

use App\Models\Call;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;

class CallController extends BaseController
{
    /**
     * This endpoint is for Call list into the app tutor
     */
    public function getCallsXContact($id) 
    {
        $contact = Contact::findOrFail($id);

        if (isset($contact)) {
            $calls = Call::where(['contact_id' => $contact->id])->get();

            return $this->sendResponse($calls, "Call list of this contact.");
        } else {
            return $this->sendError("No Content.", 204);
        }       
    }

    /**
     * This endpoint is for store Call
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'received' => 'required',
            'date' => 'required|date',
            'contact_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $call = Call::create([
            'received' => $request->received,
            'date' => $request->date,
            'duration' => $request->duration,
            'contact_id' => $request->contact_id
        ]);

        return $this->sendResponse($call, "Call saved successfully.");
    }

    /**
     * This endpoint is for update call
     */
    public function update(Request $request, $id)
    {
        $call = Call::findOrFail($id);
        
        if (isset($call)) {
            $call->update($request->all());

            return $this->sendResponse($call, "Call updated successfully.");
        }

        return $this->sendError("Not Found.", 404);
    }

    /**
     * This endpoint is for show call
     */
    public function show($id)
    {
        $call = Call::findOrFail($id);

        if (isset($call)) {
            return $this->sendResponse($call, "Contact found");
        }

        return $this->sendError("Not Found.", 404);
    }

    /**
     * This endpoint is for delete
     */
    public function destroy($id)
    {
        $user = Auth::user();

        if (isset($user)) {
            $call = Call::findOrFail($id);
            if (isset($call)) {
                $call->delete();
                return $this->sendResponse($call, "Contact has deleted.");
            }

            return $this->sendError("Not Found.", 404);
        }

        return $this->sendError("Unauthorized", 401);
    }
}
