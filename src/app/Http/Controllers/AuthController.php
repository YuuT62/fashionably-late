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
        $not = Contact::all();
        return view('admin', compact('contacts', 'categories','not'));
    }

    public function reset(){
        return redirect('/admin');
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->paginate(7);
        $categories = Category::all();
        $not = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->get();

        return view('admin', compact('contacts', 'categories', 'not'));
    }

    public function destroy(Request $request){
    Contact::find($request->id)->delete();

    return redirect('/admin');
    }


    public function export(Request $requests)
    {
        $temps = [];
        $csvHeader = ['id', 'category_id','first_name', 'last_name','gender', 'email', 'tell', 'address', 'building', 'content','created_at', 'updated_at'];
        array_push($temps, $csvHeader);
        $gender=array('','男性','女性','その他');
        foreach($requests->contact_id as $request){
            $data = Contact::with('category')->find($request)->only(['id','category','first_name','last_name','gender','email','tell','address','building','content','created_at','updated_at']);
            $contact = [
                $data['id'],
                $data['category']['content'],
                $data['first_name'],
                $data['last_name'],
                $gender[$data['gender']],
                $data['email'],
                $data['tell'],
                $data['address'],
                $data['building'],
                $data['content'],
                $data['created_at'],
                $data['updated_at']
            ];
            array_push($temps, $contact);
        }
        $stream = fopen('contact.csv', 'w');

        foreach($temps as $temp){
            fputcsv($stream, $temp);
        }
        fclose($stream);
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize('contact.csv'));
        header('Content-Disposition: attachment; filename=contact.csv');
        readfile('contact.csv');
        return redirect('/admin');

    }


}
