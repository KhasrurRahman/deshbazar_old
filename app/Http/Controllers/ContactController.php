<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('admin.contact.add-contact');
    }
    public function saveContact(Request $request){
        $contact = new Contact;
        $contact->contact_detail = $request->contact_detail;
        $contact->save();

        return redirect('/edit-contact')->with('message', 'Contact info save Success');
    }
    public function editContact(){
        $contact = Contact::find(1);
        return view('admin.contact.edit-contact',['contact'=>$contact]);
    }
    public function updateContact(Request $request){
        $contact = Contact::find(1);
        $contact->contact_detail = $request->contact_detail;
        $contact->save();

        return redirect('/edit-contact')->with('message', 'Contact info update Success');
    }
    public function contactUs(){
        $contact = Contact::find(1);
        return view('frontend.help-support.contact-us',['contact'=>$contact]);
    }
}
