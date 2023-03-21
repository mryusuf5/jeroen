<?php

namespace App\Http\Controllers;

use App\Models\contactMessages;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_messages = contactMessages::orderBy('created_at', 'DESC')->get();

        return view('admin.contact_messages.index', compact('contact_messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $contactMessages = new contactMessages();

        $contactMessages->firstname = ucfirst($request->firstname);
        $contactMessages->lastname = ucfirst($request->lastname);
        $contactMessages->email = $request->email;
        $contactMessages->phone_number = $request->phone_number;
        $contactMessages->message = $request->message;
        $contactMessages->save();

        return redirect()->route('home')->with('success', 'Bericht verstuurd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(contactMessages $contactMessage): View
    {
        return view('admin.contact_messages.show', compact('contactMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contactMessages $contactMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contactMessages $contactMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contactMessages $contactMessage)
    {
        contactMessages::destroy($contactMessage->id);

        return redirect()->route('admin.contact_messages.index')->with('success', 'Bericht verwijderd.');
    }
}
