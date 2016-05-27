<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.list', compact('users'));
    }

    public function getShow($id)
    {
        // get the nerd
        $user = User::find($id);

        // show the view and pass the nerd to it
        return view('users.display-user', compact('user'));
           
    }

    public function getCreate()
    {
        $user = new User();
        
        return view('users.add', compact('user'));

    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));

    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'location' => 'required',

        ]);

        $user = new User($request->all());

        $user->save();
        return redirect('users');
       
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'location' => '',
            'profile_url' => '',
            'admin' => '',

        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->profile_url = $request->profile_url;
        $user->admin = $request->admin;

        $user->save();
        return redirect('users');
    }

    public function postDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('users');

    }


}
