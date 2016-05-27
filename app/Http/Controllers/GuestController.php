<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class GuestController extends Controller
{
    public function getUsers()
    {
    	return view('farmersmarket.users-view', compact('users'));
    }

    public function getHome()
    {
    	return view('farmersmarket.farmersmarket');
    }

    public function getTopRatedUsers()
    {
    	return view('farmersmarket.users-toprated');
    }

     public function getTopSellers()
    {
    	return view('farmersmarket.users-topsellers');
    }
}
