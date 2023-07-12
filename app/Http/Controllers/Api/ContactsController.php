<?php

namespace App\Http\Controllers\Api;

use App\Models\Children;
use App\Models\Contact;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactsController extends BaseController
{
    /**
     * This endpoint is for contacts list into the app tutor
     */
    public function getContactsXKid($id)
    {
        $kid = Children::findOrFail($id);
        $tutor = Tutor::findOrFail($kid->tutor_id);

        if (Auth::user()->id == $tutor->user_id) {
            $contacts = $kid->contacts;

            return $this->sendResponse($contacts, "Contacts list of your kid.");
        } else {
            return $this->sendError("No Content.", 204);
        }
    }

    /**
     * This endpoint is for store contacts
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phoneNumber' => 'required|string|max:500',
            'children_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phoneNumber = $request->phoneNumber;
        $contact->children_id = $request->children_id;
        $contact->save();

        return $this->sendResponse($contact, "File saved successfully.");
    }

    /**
     * This endpoint is for update contact
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        if (isset($contact)) {
            $contact->name = $request->name;
            $contact->phoneNumber = $request->phoneNumber;
            $contact->children_id = $request->children_id;
            $contact->save();
            //$contact->update($request->all());

            return $this->sendResponse($contact, "Contact updated successfully.");
        }

        return $this->sendError("Not Found.", 404);
    }

    /**
     * This endpoint is for show contact
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        if (isset($contact)) {
            return $this->sendResponse($contact, "Contact found");
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
            $contact = Contact::findOrFail($id);
            if (isset($contact)) {
                $contact->delete();
                return $this->sendResponse($contact, "Contact has deleted.");
            }

            return $this->sendError("Not Found.", 404);
        }

        return $this->sendError("Unauthorized", 401);
    }


    /* TODO: Endpoint que recibe un json con array de contactos a almacenar en la BD */
    public function storeContacts(Request $request)
    {
        $json = $request->json()->all();
        $contacts = $json['contacts'];
        $childrenId = $json['children_id'];

        foreach ($contacts as $contactData) {
            $contact = new Contact();
            $contact->name = $contactData['name'];
            $contact->phoneNumber = $contactData['number'];
            $contact->children_id = $childrenId;
            $contact->save();
        }

        return $this->sendResponse($json, 'Datos almacenados correctamente');
    }
}