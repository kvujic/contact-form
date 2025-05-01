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

    public function export(Request $request) {

        // data acquisition
        $contacts = Contact::with('category')->get()->toArray();

        $genderLabels = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $query = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->date);

            $contacts = $query->get();


        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contact.csv"',
        ];

        $callback = function() use($contacts, $genderLabels) {
            $csvContent = fopen('php://output', 'w');

            // header
            $header = ['ID', 'name', 'gender','email', 'tel', 'address', 'building', 'category', 'detail'];
            fputcsv($csvContent, array_map(fn($value) => mb_convert_encoding($value, 'SJIS-win', 'UTF-8'),$header));

            // body
            foreach($contacts as $contact) {
                 $row = [
                    $contact->id,
                    $contact->last_name . " " . $contact->first_name,
                    $genderLabels[$contact->gender],
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    optional($contact->category)->content,
                    $contact->detail,
                 ];

                fputcsv($csvContent, array_map(fn($value) => mb_convert_encoding($value, 'SJIS-win', 'UTF-8'), $row));
            }

            fclose($csvContent);
        };

        return response()->stream($callback, 200, $headers);

    }
}
