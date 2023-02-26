<?php

namespace App\Traits;
use App\Models\User;
trait GeneralTrait{

    

    public function index() {
        $file_extension = $request -> file('photo')->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'img/profiles';
        $request-> file('photo') ->move($path,$file_name);
    }


    

    

}
