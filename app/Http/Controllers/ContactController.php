<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('pages.contact');
    }

    public function ContactForm(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        ContactForm::insert($data);
        $notification = array(
            'message' => 'Your Message Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
