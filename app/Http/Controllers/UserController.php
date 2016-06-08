<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name','asc')->paginate(10);
        $options = ['name' => 'Name','email' => 'Email'];

        return view('users.list', compact(['users','options']));
    }

    public function orderBy(Request $request)
    {
        
        $users = User::orderBy($request->input('options'),'asc')->paginate(10); 
        $options = ['name' => 'Name','email' => 'Email']; 
        return view('users.list', compact(['users','options']));
    }

    public function getShow($id)
    {
        
        $user = User::find($id);

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

    public function getComments()    // Vista admin dos comentários bloqueados
    {
        $user = User::all();
        $user->getComments()->where('blocked', 1);

        return view('user.comments', compact('user'));  
    }

    public function getAdvertisements()      // Vista Admin dos advertisements bloqueados
    {
        $user = User::all();
        $user->getAdvertisements()->where('blocked', 1);

        return view('user.advertisements', compact('user')); 
    }

    public function getBids($id) // TODO: View
    {
        $user = User::find($id);
        $user->getAdvertisements();

        return view('users.bids', compact('user'));
    }

}
