<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('admin.register.create');
    }

    public function registerstore(Request $request)
    {
       $input = $request->all();

       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password'])
      ]);
       return redirect('/admin/users');
    }

    public function index()
    {
        $users = User::all();
        return view ('admin.user.index',compact ('users'));
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view ('admin.user.edit',compact ('user'));
    }
    public function update (Request $request, $user_id)
    {
        $user = User::find($user_id);
        if($user)
        {
            $user->role_as = $request ->  role_as;
            $user->update();
            return redirect ('admin/users',)->with('message','Updated Successfully');
        }
        return redirect ('admin/users',)->with('message','No User Found');
    }

    public function destroy ($user_id)
    {
        $user = User::find ($user_id);
        $user -> delete();
        return redirect('admin/users')->with('message','Post Deleted Successfully');
    }

}
