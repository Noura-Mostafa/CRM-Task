<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index(User $user)
    {
        return view('contacts.index' , [
            'user' => $user
        ]);
    }


    public function create(User $user)
    {
        return view('contacts.create' , [
            'user' => $user
        ]);
    }


    public function store(Request $request , User $user)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'work' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'int', 'exists:users,id'],
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $contact = Contact::create($request->all());


        return redirect()->route('users.contacts.show',[$user->id, $contact->id]);

    }

    public function show(User $user , Contact $contact)
    {

        $contact = Contact::where('user_id' , $user->id)->get();

        return view(
            'contacts.show',
            [
                'contact' => $contact,
                'user' => $user
            ]
        );
    }


    public function edit(User $user , Contact $contact)
    {
        return view(
            'contacts.edit',
            [
                'contact' => $contact,
                'user' => $user,
            ]
        );
    }


    public function update(Request $request,User $user , Contact $contact)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'work' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'int', 'exists:users,id'],
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $contact->update($request->all());


        return redirect()->route('users.contacts.show' , [$user->id , $contact->id])
            ->with([
                'success' => 'Contact updated!',
                'contact' => $contact,
                'user' => $user,
            ]);
    }


    public function destroy(User $user ,Contact $contact)
    {
        $contact->delete();
        return redirect()->route('users.contacts.show' , [$user->id , $contact->id]);
    }
}
