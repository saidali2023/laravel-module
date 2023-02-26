<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Module;
use App\Models\AllModule;
class ModEnableController extends Controller
{
    
    public function modulStore(Request $request)
    {
    	$moduleblog = Module::find($request->module_name);
        
        if($request->module_status=='enable'){

            var_dump($moduleblog->disable());
        }else{
            $add = new AllModule;
            $add->name = $request->module_name;

            $add->save();
            var_dump($moduleblog->enable());
        }

        return back();
    }
    public function adminLogin(Request $request)
    {
        return view('admin.login');
    }
    
}
