<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'message' => 'required'
        ]);
    
        Contact::create($validated);
    
        return response()->json([
            'message' => 'Merci ! Votre message a été envoyé avec succès.'
        ],201);
    }
}
