<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;    
use Auth;
use App\Models\AllModule;
use App\Models\UserModule;
use Illuminate\Support\Str;
class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users.all',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.add_user',compact('roles'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            // 'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));    
        // }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    
    public function imageUpload()
    {
        return view('imageUpload');
    }
    public function imageUploadPost(Request $request)
    {
        $fileName = $request->file->getClientOriginalName();
        $filePath = 'uploads/' . $fileName;
 
        $path = Storage::disk('s3')->put($filePath, file_get_contents($request->file));
        $path = Storage::disk('s3')->url($path);
        return back()
            ->with('success','File has been successfully uploaded.');
    }
    public function module_permissions($id)
    {
        $user = User::find($id);
        $allmodule= AllModule::where('status',1)->get();
        return view('admin.users.module_permissions',compact('allmodule','user'));
    }

    public function modulePermissionsPost(Request $request)
    {
        $checki_user_module = UserModule::where("user_id" , $request->user_id)->
                                          where("module_id" , $request->module_id)->first();

        if($checki_user_module){
            UserModule::find($checki_user_module->id)->delete();
            return back()->with('message','User deleted successfully');
        }else{
            $add = new UserModule;
            $add->user_id = $request->user_id;
            $add->module_id = $request->module_id;
            $add->name = 'app/'.$request->name;

            $add->save();
            return back()->with('message','module added successfully');
        }
    }
}