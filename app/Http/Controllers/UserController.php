<?php

namespace App\Http\Controllers;

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
        return view('users.add');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));

    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
            //'location' => 'required|min:2',
            //'profile_photo' => 'required',
            //'profile_url' => '',
            //'presentation' => 'required',
            //'admin' => 'required',
            //'blocked' => '',
            //'sells_evals' => '',
            //'sells_count' => '',
            //'buys_evals' => '',
            //'buys_count' => '',
        ]);
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
            //'location' => 'required|min:2',
            //'profile_photo' => 'required',
            //'profile_url' => '',
            //'presentation' => 'required',
            //'admin' => 'required',
            //'blocked' => '',
            //'sells_evals' => '',
            //'sells_count' => '',
            //'buys_evals' => '',
            //'buys_count' => '',
        ]);
    }

    public function postDelete(Request $request)
    {
        
    }


}
