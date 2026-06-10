<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\PractiseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\MailController;

//    use to declare all routes of our site
/*

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



//           =>  :   Practise Routes

Route::get('/register-form',[PractiseController::class,'registerForm']);
Route::post('/submit-register-form',[PractiseController::class,'handleRegisterForm']);

//           =>  :   Route grouping  

Route::prefix('/lpu')->group(function(){
    Route::get('/student',function(){
        return 'Student Page';
    });
    Route::get('/faculty',function(){
        return 'Faculty page';
    });

});


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








//     =>         CA1            






Route::get('/fetch-data', function () {
    return view('pages.studentform');
})->name('fetch-data');
Route::post('/submit-data', [StudentController::class, 'fetchData']);



//   =>    Inheriting master layout routes

Route::get('/dashboard', function () {
    return view('layout.dashboard');
})->name('dashboard');



//   =>     session

Route::get('/login',function(){
    return view('pages.loginPage');
});
Route::post('/loginSubmit',[LoginController::class,'login']);

Route::get('/logout',[LoginController::class,'logout']);

*/



























Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return "<h1>Welcome to Home Page</h1>";
});

// Route::get('/first',function(){
//     return view('firstPage');
// });
Route::get('/first',[FirstController::class,'create']);
Route::post('/first',[FirstController::class,'store']);

//  => Localization

Route::get('/{lang?}', function ($lang = 'en') {

    App::setLocale($lang);

    return view('welcome');
});


// =>  Mail 

Route::get('/send-mail',[MailController::class,'register']);