<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(){
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['category_id','first_name','last_name','gender','email','first-number','middle-number','last-number','address','building','content']);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact','category'));
    }

    public function store(Request $request){
        $contact = $request->only(['category_id','first_name','last_name','gender','email','first-number','middle-number','last-number','address','building','content']);
        $contact =array_merge($contact,array('tell'=>$contact['first-number'].$contact['middle-number'].$contact['last-number']));
        Contact::create($contact);
        return view('thanks');
    }
}
