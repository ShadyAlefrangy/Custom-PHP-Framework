<?php

namespace App\Controllers;

class PagesController
{
	   
    public function home()
    {
        
        return view('index');

    }

    public function about()
    {
        $company = 'Laracast';
        // require 'views/about.view.php';
        return view('about', ['company' => $company]);

    }

    public function contact()
    {
        # code...

        // require 'views/contact.view.php';
        return view('contact');

    }
}