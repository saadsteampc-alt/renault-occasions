<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('client.contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you would typically send an email or save the contact form data
        // For now, we'll just redirect back with a success message
        
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt !');
    }
}
