<?php

namespace Modules\Contacts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contacts\Models\Contact;

use Route;
use Illuminate\Support\Facades\Gate;
class ContactsController extends Controller
{
    public function index()
    {
        // if (! Gate::allows('view-module'))
        //     abort(403);
        $contacts = Contact::get();

        return view('contacts::index', compact('contacts'));
    }

    public function create()
    {
        
        return view('contacts::create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string'
        ]);

        Contact::create([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.contacts.index'));
    }

    public function edit($id)
    {
       
        $contact = Contact::findOrFail($id);

        return view('contacts::edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string'
        ]);

        Contact::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.contacts.index'));
    }

    public function destroy($id)
    {
        
        Contact::findOrFail($id)->delete();

        return redirect(route('app.contacts.index'));
    }
}
