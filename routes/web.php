<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admina', function () {
    $mymodule=Module::all();
    // foreach ($mymodule as $_item){
    //     if($_item->isEnabled()){
    //          echo 'yes <br>';
    //     }else{
    //        echo 'no <br>';
    //     }
       

    // }
    // dd($mymodule);
    return view('admin.all',compact('mymodule'));
});

Route::post('/modulstore', [App\Http\Controllers\ModEnableController::class, 'modulStore'])->name('modulstore');

Route::get('/', function () {
    
    // $allmymodule=Module::all();
    // foreach($allmymodule as $allmymod){
    //     echo $allmymod .'<br>';   
    // }
    
    $moname="blog";
    $moduleblog = Module::find('Posts');
    dd($moduleblog->disable());
    dd(Module::all());
    echo $moduleblog ." <br>";
    dd(Module::all());
    dd(gettype($allmymodule));
    // return view('welcome');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
