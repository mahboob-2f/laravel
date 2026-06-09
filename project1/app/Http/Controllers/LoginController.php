<?php

namespace App\Http\Controllers;

use App\Services\MongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(private MongoService $mongo)
    {
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (! $this->mongo->ping()) {
            return back()->withInput()->withErrors([
                'database' => 'MongoDB connection failed. Make sure MongoDB is running on 127.0.0.1:27017.',
            ]);
        }

        $user = $this->mongo->findOne('users', [
            '$or' => [
                ['username' => $credentials['username']],
                ['email' => $credentials['username']],
            ],
        ]);

        if (! $user || ! Hash::check($credentials['password'], $user['password'] ?? '')) {
            return back()->withInput()->withErrors([
                'username' => 'Invalid username/email or password.',
            ]);
        }

        $request->session()->put('username', $user['username'] ?? $user['name'] ?? 'User');

        return redirect('/dashboard')->with('success', 'Login successful.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
