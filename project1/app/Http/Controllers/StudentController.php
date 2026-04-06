<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function fetchData(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|min:1',
            ]);
            
            $data =[
                ["id"=>1,"name"=> 'Amit',"course"=> 'BCA',"city"=> 'delhi'],
            ["id"=>2,"name"=> 'Sumit',"course"=> 'BBA',"city"=> 'mumbai'],
            ["id"=>3,"name"=> 'Rohit',"course"=> 'B.Tech',"city"=> 'chennai'],
        ];

        $id = $validated['id'];
        $index = $id - 1;

        if (! array_key_exists($index, $data)) {
            return back()->withInput()->with('error', 'invalid id');
        }
            
            $fetched = $data[$index];
            return view('pages.student',compact('fetched'));
            }
            
            














            
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
        