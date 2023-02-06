<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        if (count($contacts) > 0) {
            return ContactResource::collection($contacts);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no contacts yet'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json([
                'success' => true,
                'msg' => 'contact has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such contact'
            ], 404);
        }
    }
}
