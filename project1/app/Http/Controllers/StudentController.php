<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // create a function that will return a registration form
    public function regForm()
    {
        return view('pages.regForm');
    }
    public function handleForm(Request $request)
    {
        // return 'form submitted successfully.';  will be some other page

        /*
        return '<script> alert("form submitted successfully!"); </script>
            $request->all();   
        ';
            $data = $request->all();
            return $data;
        */
        //    TODO :   validation in form

        $request->validate(([
            'username' => 'min:4|max:20|regex:/^[A-Za-z0-9_]+$/',
            'name' => 'min:4|max:20|regex:/^[A-Za-z\s]+$/',
            'email' => 'email|unique:users,email',
            'password' => 'required|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&*])[A-Za-z0-9@#$%^&*]+$/'
        ]));

        $data = $request->all();
        return $data;
    }
}
