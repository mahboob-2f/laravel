<?php

use Illuminate\Support\Facades\Route;

//    use to declare all routes of our site
Route::get('/', function () {
    return view('welcome');
});

//   create route that return a string

Route::get('/hey', function () {
    return 'Hello from hey';
});

//   create route with parameter
Route::get('user/{name}',function($name){
    return 'Hello '.$name;
});

Route::get('/table/{num}',function($num){
    for($i=1;$i<=10;$i++){
        echo $num.' x '.$i.' = '.$num*$i.'<br>';
    }
});

//  create route with optional parameter
Route::get('user/{name?}',function($name='Guest'){
    echo 'Hello '.$name;
});