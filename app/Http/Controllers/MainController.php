<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class MainController extends Controller
{
    public function getUsers()
    {

    	return view('farmersmarket.users-view', compact('user'));
    }

    public function getAllUsers()
    {
    	return view('farmersmarket.users-all');
    }
 
    public function getUserProfile()
    {
    	return view('farmersmarket.user-profile');
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
