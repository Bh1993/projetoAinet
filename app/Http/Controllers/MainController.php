<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Advertisement;

class MainController extends Controller
{
    public function getUsers()
    {
    	$users = User::orderByRaw("RAND()")->take(8)->get();
    	return view('farmersmarket.users-view', compact('users'));
    }

    public function getAllUsers()
    {	
    	$users = User::paginate(8);

    	return view('farmersmarket.users-all', compact('users'));
    }

    public function getUserProfile($id)
    {
    	$user = User::find($id);
    	return view('farmersmarket.user-profile',compact('user'));
    }
 
    
    public function getHome()
    {
    
    	$users = User::orderByRaw("RAND()")->take(8)->get();

    	$advertisements = Advertisement::with('media')->has('media')->orderByRaw("RAND()")->take(8)->get();


    	return view('farmersmarket.farmersmarket',compact(['users','advertisements']));
    }

    public function getTopRatedUsers()
    {
    	$users = User::paginate(8);

    	return view('farmersmarket.users-toprated', compact('users'));
    }

     public function getTopSellers()
    {
    	$users = User::paginate(8);
    	return view('farmersmarket.users-topsellers', compact('users'));
    }

    public function getAllAdvertisements()
    {
    	
    	return view('farmersmarket.advertisements-all');
    }

     public function getTopRatedAdvertisements()
    {
    	
    	return view('farmersmarket.advertisements-toprated');
    }

     public function getMostViewedAdvertisements()
    {
    	
    	return view('farmersmarket.advertisements-mostviewed');
    }

     public function getMostSoldAdvertisements()
    {
    	
    	return view('farmersmarket.advertisements-bestsellers');
    }
}
