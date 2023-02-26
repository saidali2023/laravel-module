<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;

// use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProductController;
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
Route::get('/send-gride-mail', function () {

    $data = ['message' => 'This is a testyyyyy!'];

    Mail::to('hamadaali889900@gmail.com')->send(new TestEmail($data));
    return 'message sent ssss ';
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    
    Route::get('module_permissions/{id}', [UserController::class, 'module_permissions']);
    Route::post('/module_permissions', [UserController::class, 'modulePermissionsPost'])->name('module_permissions');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/allmodule', function () {
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

Route::get('/', function () {
    
    // $allmymodule=Module::all();
    // foreach($allmymodule as $allmymod){
    //     echo $allmymod .'<br>';   
    // }
    
    $moname="blog";
    $moduleblog = Module::find('posts');
    //  Artisan::call($moduleblog->disable());
    // return 'message sent ssss ';
    // dd($moduleblog->disable());
    // dd(Module::all());
    // echo $moduleblog ." <br>";
    // dd(Module::all());
    // dd(gettype($allmymodule));
    return view('welcome');
});

Route::post('/modulstore', [App\Http\Controllers\ModEnableController::class, 'modulStore'])->name('modulstore');


  Route::get('admin-login', [App\Http\Controllers\ModEnableController::class, 'adminLogin'])->name('admin-login');

Route::get('/home', function () {
    return view('admin.index_admin');
});    

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

