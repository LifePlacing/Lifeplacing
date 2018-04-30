<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IniController extends Controller
{
    public function inicio()
    {
    	return view('welcome');
    }

    public function faq()
    {
    	return view('faq');
    }    
}
