<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request) {
        Contact::insert([
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('contact')->with('success', 'Inserted Successful');
    }

    public function EditContact($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function UpdateContact(Request $request, $id){
        Contact::find($id)->update([
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('contact')->with('success', 'Updated Successful');
    }


    public function Delete($id) {
        Contact::find($id)->delete();
        return redirect()->route('contact')->with('success', 'Deleted Successful');
    }

    public function ContactPage() {
        $contact = Contact::all()->first();
        return view('contact', compact('contact'));
    }

    public function AdminMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }


}
