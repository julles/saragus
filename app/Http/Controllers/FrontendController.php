<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class FrontendController extends Controller
{
    public function listing()
    {
    	$listing = News::all();

    	return view('frontend.news',compact('listing'));
    }
}
