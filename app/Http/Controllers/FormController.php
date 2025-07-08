<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'user_name'=>'required|min:3',
            'email'=>'required|email'
        ],[
            'user_name.required'=>'নাম অবশ্যই দিতে হবে।'
        ]);

        return 'Form submit successfully!';
    }
}
