<?php

namespace App\Http\Controllers;

use App\Services\MongoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Exception\Exception as MongoDBException;

class StudentController extends Controller
{
    public function __construct(private MongoService $mongo)
    {
    }
    
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
            public function handleForm(Request $request): RedirectResponse
            {
                $validated = $request->validate(([
                    'username' => 'required|min:4|max:20|regex:/^[A-Za-z0-9_]+$/',
                    'name' => 'required|min:4|max:20|regex:/^[A-Za-z\s]+$/',
                    'email' => 'required|email',
                    'password' => 'required|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&*])[A-Za-z0-9@#$%^&*]+$/'
                ]));

                if (! $this->mongo->ping()) {
                    return back()->withInput()->withErrors([
                        'database' => 'MongoDB connection failed. Make sure MongoDB is running on 127.0.0.1:27017.',
                    ]);
                }

                if ($this->mongo->exists('users', ['email' => $validated['email']])) {
                    return back()->withInput()->withErrors([
                        'email' => 'This email is already registered.',
                    ]);
                }

                if ($this->mongo->exists('users', ['username' => $validated['username']])) {
                    return back()->withInput()->withErrors([
                        'username' => 'This username is already taken.',
                    ]);
                }

                try {
                    $this->mongo->insertOne('users', [
                        'username' => $validated['username'],
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => Hash::make($validated['password']),
                        'source' => 'student_register',
                        'created_at' => date('c'),
                        'updated_at' => date('c'),
                    ]);
                } catch (MongoDBException) {
                    return back()->withInput()->withErrors([
                        'database' => 'Unable to save your registration in MongoDB right now.',
                    ]);
                }

                return back()->with('success', 'Registration saved to MongoDB successfully.');
            }
}
        
