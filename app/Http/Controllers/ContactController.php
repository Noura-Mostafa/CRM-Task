<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $query = Contact::where('user_id', Auth::id())
            ->latest();

        if ($request->search) {
            $query->where('name', 'LIKE', "%{$request->search}%")
                  ->orWhere('email', 'LIKE', "%{$request->search}%");
        }

        $contacts = $query->simplePaginate(4);


        return view('contacts.index', [
            'contacts' => $contacts,
        ]);

    }

    public function create()
    {
        return view('contacts.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255'],
            'date_of_birth' => ['required'],
            'work' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'int', 'exists:users,id'],
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        Auth::user()->contacts()->create($request->all());

        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }


    public function edit(Contact $contact)
    {
        return view('contacts.edit', ['contact' => $contact]);
    }


    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255'],
            'date_of_birth' => ['required'],
            'work' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'int', 'exists:users,id'],
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $contact->update($request->all());


        return redirect()->route('contacts.index')
            ->with([
                'contact' => $contact,
            ]);
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
