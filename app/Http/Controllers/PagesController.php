<?php

namespace App\Http\Controllers; // added the name space

use Illuminate\Http\Request; // brings in the request library
                             // so that we can handle requests

class PagesController extends Controller
{
    public function index(){
        $title = 'This is the Laravel Application From the "Madforre"'; 
        // return view('pages.index', compact('title')); 
        return view('pages.index')->with('title', $title);
        
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    // creates a controller called pages controller
    // and then extends the core the standard controller.
    // any controller you create should  extend this.
}
