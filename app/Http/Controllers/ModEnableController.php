<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Module;
use App\Models\AllModule;
use App\Models\UserModule;
use Illuminate\Support\Facades\Gate;
class ModEnableController extends Controller
{
    
    public function modulStoreuser(Request $request)
    {
    	$moduleblog = Module::find($request->module_name);
        $moduleNameUser='app/'.$request->module_name;
        if($request->module_status=='enable'){
            if(Gate::allows('module-used',$moduleNameUser)){
                return back()->with('message','the module is used');
            }else{
                $allmodule= AllModule::where('name',$request->module_name)->first();
                $allmodule->status=0;
                $allmodule->save();
                var_dump($moduleblog->disable());
            }                              
        }else{
            $checki_user_module = AllModule::where("name" , $request->module_name)->first();
            if(!$checki_user_module){
                $add = new AllModule;
                $add->name = $request->module_name;
                $add->save();
            }else{
                $checki_user_module->status=1;
                $checki_user_module->save();
            }    
            var_dump($moduleblog->enable());
        }
        return back();
    }
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
    public function adminLogin(Request $request)
    {
        return view('admin.login');
    }
    
}
