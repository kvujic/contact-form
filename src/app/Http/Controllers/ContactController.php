<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        
        return view('index');
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['last_name','first_name','gender','email','tel','address', 'detail','category_id']);
        return view('confirm', compact('contact'));

    }
}
