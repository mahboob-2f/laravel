<?php

namespace App\Http\Controllers;

use App\Services\MongoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Exception\Exception as MongoDBException;

class PractiseController extends Controller
{
    public function __construct(private MongoService $mongo)
    {
    }

    public function registerForm(){
        return view('practise.registerForm');
    }

    public function handleRegisterForm(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'=>'required|min:4|max:20|regex:/^[A-Za-z\s]+$/',
            'age'=>'required|integer|between:18,100',
            'course'=>'required|min:2|max:50|regex:/^[A-Za-z\s]+$/',
            'email'=>'required|email',
            'password'=>'required|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&*])[A-Za-z0-9@#$%^&*]+$/'
        ]);

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

        try {
            $this->mongo->insertOne('users', [
                'name' => $validated['name'],
                'age' => (int) $validated['age'],
                'course' => $validated['course'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'source' => 'practice_register',
                'created_at' => date('c'),
                'updated_at' => date('c'),
            ]);
        } catch (MongoDBException) {
            return back()->withInput()->withErrors([
                'database' => 'Unable to save your registration in MongoDB right now.',
            ]);
        }

        return back()->with('success', 'Account created and stored in MongoDB.');
    }
}
