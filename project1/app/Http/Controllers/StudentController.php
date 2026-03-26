<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // create a function that will return a registration form
    public function regForm(){
        return view('pages.regForm');
    }
    public function handleForm(Request $request){
        // return 'form submitted successfully.';  will be some other page
        
        /*
        return '<script> alert("form submitted successfully!"); </script>
            $request->all();   
        ';
        */
        $data = $request->all();
        return $data;

    }
}
