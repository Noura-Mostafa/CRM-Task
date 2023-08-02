<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index()
    {
        return view('contacts.index');
    }


    public function create(User $user)
    {
        return view('contacts.create');
    }


    public function store(Request $request)
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


        return redirect()->route('contacts.show',$contact->id);

    }

    public function show(User $user , Contact $contact)
    {

        // $contact = Contact::where('user_id' , 'user.id')->get();

        return view(
            'contacts.show',
            [
                'contact' => $contact,
                'user' => $user
            ]
        );
    }


    public function edit(Contact $contact)
    {
        return view(
            'contacts.edit',
            [
                'contact' => $contact,
            ]
        );
    }


    public function update(Request $request , Contact $contact)
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


        return redirect()->route('contacts.show' , $contact->id)
            ->with([
                'success' => 'Contact updated!',
                'contact' => $contact,
            ]);
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
