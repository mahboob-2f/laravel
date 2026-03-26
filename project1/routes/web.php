<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\StudentController;

//    use to declare all routes of our site
Route::get('/', function () {
    return view('welcome');
});

//      controller 
Route::get('/greet',[Mycontroller::class,'index']);

Route::get('/home',[Mycontroller::class,'home']);

Route::get('/admin-details',[Mycontroller::class,'adminDetails']);

Route::get('/myjson',[Mycontroller::class,'myjson']);

//                 //       TODO:  form handlding routes 

Route::get('/register',[StudentController::class,'regForm']);
Route::post('/submitForm',[StudentController::class,'handleForm']);


//   create route that return a string

Route::get('/hey', function () {
    return 'Hello from hey';
})->name('hey');

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

//   creating view from route
Route::get('/home-page',function(){
    return view('firstPage');
});
Route::get('/header',function(){
    return view('pages.header');
});

// passing data from route
Route::get('/username/{name}',function($name){
    echo 'hello '.$name;
});

Route::get('/user-info',function(){
    return view('pages.userInfo',['name'=>'Mahi', 'age'=>25]);
});


Route::get('/btech/result-2025',function(){
    $students=[
        ['name'=>'Mahi','regNo'=>101,'cgpa'=>8.5],
        ['name'=>'Rohit','regNo'=>102,'cgpa'=>3.0],
        ['name'=>'Sita','regNo'=>103,'cgpa'=>9.5],
    ];
    return view('pages.result',compact('students'));
});