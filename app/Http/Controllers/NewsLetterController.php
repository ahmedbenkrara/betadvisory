<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsLetterController extends Controller
{
    public function index(){
        $emails = NewsLetter::all();
        return view('admin.newsletter.list', compact('emails'));
    }

    public function store(Request $request){
        NewsLetter::create([
            'email' => $request->email
        ]);
        return back();
    }
}
