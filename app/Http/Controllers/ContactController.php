<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
    
        $contact = Contact::create($request->validated());
    
        return response()->json([
            'success' => true,
            'message' => 'Merci ! Votre message a été envoyé avec succès.',
            'data' => $contact
        ],201);
    }
}
