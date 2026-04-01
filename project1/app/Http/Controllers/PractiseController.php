<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class PractiseController extends Controller
{
    //
    public function registerForm(){
        return view('practise.registerForm');
    }

    public function handleRegisterForm(Request $request){
        // return '<script> alert("Form submitted successfully!") </script>';
        // return $request->all();


        //          todo: validating form
        $request->validate([
            'name'=>'min:4|max:20|regex:/^[A-Za-z\s]+$/',
            'age'=>'integer|between:18,100',
            'course'=>'min:2|max:50|regex:/^[A-Za-z\s]+$/',
            'email'=>'email|unique:users,email',
            'password'=>'min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&*])[A-Za-z0-9@#$%^&*]+$/'
        ]);
        
        $data = $request->all();
        return $data;
    }
}
