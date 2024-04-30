<?php

namespace App\Http\Controllers;


use DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $user = auth()->user();

        $companies = Company::userCompanies();

        $contacts = auth()->user()->contacts()->with('company')->latestFirst()->paginate(10);



        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {

        $contact =  new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create_contact', compact('companies', 'contact'));
    }

    public function store(ContactRequest $request)
    {

        if ($request->user()->contacts()->create($request->all())) {
            return redirect()->route('contacts.index')->with(['success' => 'Successfully added te contact!']);
        } else {
            return redirect()->route('contacts.index')->with(['failure' => 'Failed to add te contact!']);
        }
    }

    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        // dd($contact);
        return view('contacts.show_contact', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        // $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $companies = Company::userCompanies();

        // $contact = Contact::findOrFail($id);


        return view('contacts.edit_contact', compact('companies', 'contact'));
    }


    public function update(Contact $contact, ContactRequest $request)
    {
        // $contact = Contact::findOrFail($id);

        if ($contact->update($request->all())) {
            return redirect()->route('contacts.index')->with(['messege' => 'Contact updated successfully!']);
        } else {
            return redirect()->route('contacts.index')->with(['messege' => 'Failed to update contact!']);
        }
    }


    public function destroy(Contact $contact)
    {

        // $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('messege', "contact deleted sucessfully");
    }
}
