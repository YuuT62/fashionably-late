<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    public function admin(){
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function reset(){
        return redirect('/admin');
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }


}
