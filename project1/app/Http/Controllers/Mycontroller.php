<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    //   create a function that will returrn  some string on the route
    public function index()
    {
        return '<h1 style="display:flex; justify-content:center; align-items:center; height:100vh;">
            Hello from myController </h1>';
    }

    public function home(){
        return view('welcome');
    }

    public function adminDetails(){
        $name='Mahi';
        $age=25;
        return view('pages.adminDetails',compact('name','age'));
    }
    public function myjson(){
        $products=[
            ['id'=>1,'name'=>'copy','price'=>100],
            ['id'=>2,'name'=>'pen','price'=>200],
        ];
        return response()->json($products);
    }


}
