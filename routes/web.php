<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

Route::get('/send-gride-mail', function () {
    $data = ['message' => 'This is a test!'];
    Mail::to('hamadaali800@gmail.com')->send(new TestEmail($data));
    return 'message sent';
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('module_permissions/{id}', [UserController::class, 'module_permissions']);
    Route::post('/module_permissions', [UserController::class, 'modulePermissionsPost'])->name('module_permissions');
    Route::get('/allmodule', function (Request $request) {
        $mymodule=Module::all();
        return view('admin.all',compact('mymodule'));
    });
});



Route::get('/', function () {
    return view('welcome');
});

Route::post('/modulstore', [App\Http\Controllers\ModEnableController::class, 'modulStore'])->name('modulstore');

Route::post('/modulstoreuser', [App\Http\Controllers\ModEnableController::class, 'modulStoreuser'])->name('modulstoreuser');

Route::get('admin-login', [App\Http\Controllers\ModEnableController::class, 'adminLogin'])->name('admin-login');

Route::get('/home', function () {
    return view('admin.index_admin');
});    

Auth::routes();


