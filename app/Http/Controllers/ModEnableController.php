<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Module;
class ModEnableController extends Controller
{
    
    public function modulStore(Request $request)
    {
    	$moduleblog = Module::find($request->module_name);
        
        if($request->module_status=='enable'){
            var_dump($moduleblog->disable());
        }else{
            var_dump($moduleblog->enable());
        }

        return back();
    }
}
