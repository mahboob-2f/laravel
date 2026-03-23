<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // create a function that will return a registration form
    public function regForm(){
        return view('pages.regForm');
    }
}
