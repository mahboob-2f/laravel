<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //
    public function create()
    {
        return view('firstPage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'age' => 'required|integer|min:18|max:100',
        ]);

        $product = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
        ];
        return response()->json([$product]);
    }
}
