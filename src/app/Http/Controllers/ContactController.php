<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use GuzzleHttp\Psr7\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', ['contact' => $contact]);
        /* compact関数でよりシンプルに記述可能
        return view('confirm), compact('contact')); */
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact); // modelの読み込み
        return view('thanks');
    }
}
