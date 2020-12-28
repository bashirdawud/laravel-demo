<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Carbon\Carbon;

class ContactFormController extends Controller
{
    public function FormSubmit(Request $request){

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contact.page')->with('success', 'message sent successfully');
    }
}
