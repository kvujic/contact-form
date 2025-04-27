<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request) {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail', 'category_id']);
        $categories = Category::all();
        return view('index', compact('categories', 'contact'));
    }


    public function confirm(ContactRequest $request) {
        $contact = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','building', 'detail','category_id']);
        $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];
        $categories = Category::all()->pluck('content', 'id');
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(ContactRequest $request) {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address','building', 'detail', 'category_id']);
        Contact::create($contact);
        return view('thanks');
    }

    public function reset() {
        Session::flush();
        return redirect('/');
    }
}
