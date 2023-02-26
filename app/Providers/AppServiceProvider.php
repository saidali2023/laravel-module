<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;
use App\Models\AllModule;
use App\Models\UserModule;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        //
    }

    public function boot()
    {

        // $user_id=Auth::user();

            view()->composer('*', function ($view) 
            {
                // $cart = Cart::where('user_id', Auth::user()->id);
                if(Auth::user()){
                    $user_modules = UserModule::where('user_id',Auth::user()->id)->get();
                    foreach ($user_modules as $item) {
                        $item->module_name= AllModule::where('id',$item->module_id)->first();
                    }
                    $view->with('all_module', $user_modules );   
                } 
            });  
        
        // $user_modules = UserModule::where('user_id',$user_id->id);
        // foreach ($user_modules as $item) {
        //     $item->module_name= AllModule::where('id',$item->module_id)->first();
        // }
        // view()->share('all_module', $user_modules);
    }
}
