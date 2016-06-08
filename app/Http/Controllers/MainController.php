<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Advertisement;
use App\Comment;

class MainController extends Controller
{
    public function getUsers()
    {
    	$users = User::orderByRaw("RAND()")->take(8)->get();
    	return view('farmersmarket.users-view', compact('users'));
    }

    public function orderBy(Request $request)
    {
        
        $users = User::orderBy($request->input('options'),'asc')->paginate(8); 
        $options = ['name' => 'Name','created_at' => 'Date','email' => 'Email','location' => 'Location']; 
        return view('farmersmarket.users-all', compact(['users','options']));
    }


    public function getAllUsers()
    {	
    	$users = User::orderBy('name','asc')->paginate(8);
        $options = ['name' => 'Name','created_at' => 'Date','email' => 'Email','location' => 'Location'];

    	return view('farmersmarket.users-all', compact(['users','options']));
    }

    public function getUserProfile($id)
    {
    	$user = User::find($id);
    	return view('farmersmarket.user-profile',compact('user'));
    }

    public function getEditProfile($id)
    {
        $user = User::find($id);
        return view('farmersmarket.user-edit-profile', compact('user'));
    }

    public function getMyProfile($id)
    {
        $user = User::find($id);
        return view('farmersmarket.user-myprofile',compact('user'));
    }
 
    public function getAdvertisementProfile($id)
    {
        $advertisement = Advertisement::find($id);
        $comment = Comment::find($id);

        return view('farmersmarket.advertisements-profile',compact(['advertisement','comment']));
    }
    
    public function getHome()
    {
    
    	$users = User::orderByRaw("RAND()")->take(8)->get();

    	$advertisements = Advertisement::with('media')->has('media')->orderByRaw("RAND()")->take(8)->get();

    	return view('farmersmarket.farmersmarket',compact(['users','advertisements']));
    }

    public function getUserAdvertisements($id)
    {
        $user = User::find($id);
        return view('farmersmarket.user-my-advertisements', compact('user'));
    }

    public function getTopRatedUsers()
    {
        $users = User::orderBy('name','asc')->paginate(8);
        $options = ['name' => 'Name','created_at' => 'Date','email' => 'Email','location' => 'Location'];
       

    	return view('farmersmarket.users-toprated', compact(['users','options']));
    }

     public function getTopSellers()
    {
    	$users = User::orderBy('name','asc')->paginate(8);
        $options = ['name' => 'Name','created_at' => 'Date','email' => 'Email','location' => 'Location'];

        
    	return view('farmersmarket.users-topsellers', compact(['users','options']));
    }

    public function getAllAdvertisements()
    {
    	$advertisements = Advertisement::paginate(8);
    	return view('farmersmarket.advertisements-all',compact('advertisements'));
    }

    public function getRecentAdvertisements()
    {
        $advertisements = Advertisement::paginate(8);
        return view('farmersmarket.advertisements-mostrecent',compact('advertisements'));
    }

    /*
     public function getTopRatedAdvertisements()
    {
    	
    	$advertisements = Advertisement::paginate(8);
        return view('farmersmarket.advertisements-toprated',compact('advertisements'));
    }

     public function getMostViewedAdvertisements()
    {
    	
    	$advertisements = Advertisement::paginate(8);
        return view('farmersmarket.advertisements-mostviewed',compact('advertisements'));
    }

     public function getMostSoldAdvertisements()
    {
    	
    	$advertisements = Advertisement::paginate(8);
        return view('farmersmarket.advertisements-bestsellers',compact('advertisements'));
    }
    */
}
