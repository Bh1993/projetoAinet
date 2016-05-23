<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.list', compact('users'));
    }

    public function getCreate()
    {
        return view('users.add');
    }

    public function getEdit()
    {
        return view('users.edit');
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
