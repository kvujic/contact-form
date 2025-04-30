<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $genders = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ];

        $categories = Category::all();

        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->date)
            ->orderBy('id')
            ->paginate(7);

        return view('admin', compact('contacts', 'genders', 'categories'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
