<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Advertisement;
use App\Bid;
use App\Comment;
use App\Tag;


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

    public function orderByProducts(Request $request)
    {
        $advertisements = Advertisement::orderBy($request->input('options'),'asc')->paginate(8);

        $options = ['name' => 'Name','available_on' => 'Date', 'price_cents' => 'Price'];
        return view('farmersmarket.advertisements-all', compact(['advertisements','options']));
    }



    public function getAllUsers()
    {	
    	$users = User::where('blocked', 0)->orderBy('name','asc')->paginate(8);
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

    public function getEdit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('farmersmarket.edit-advertisement',compact('advertisement'));
    }


    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => '',
            'available_until' => '',
            'price_cents' => '',
            'blocked' => ' ',

        ]);

        $advertisement = Advertisement::find($request->id);

        $advertisement->name = $request->name;
        $advertisement->description = $request->description;
        $advertisement->available_on = $request->available_on;
        $advertisement->available_until = $request->available_until;
        $advertisement->price_cents = $request->price_cents;
        

        $advertisement->save();
        return redirect('/');
    }

    public function postDelete($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        
        return redirect('/');
        

    }
    

    public function postEditProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'location' => '',
            'profile_url' => '',
            
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->presentation = $request->presentation;

        $user->profile_url = $request->profile_url;
       

        $user->save();
        return view('farmersmarket.user-myprofile');
    }

    public function getMyProfile($id)
    {
        $user = User::find($id);
        return view('farmersmarket.user-myprofile',compact('user'));
    }
 
    public function getAdvertisementProfile($id)
    {
        
        $advertisement = Advertisement::with('comments')->find($id);
        
        return view('farmersmarket.advertisements-profile',compact('advertisement'));
    }
    
    public function getHome()
    {
    
    	$users = User::where('blocked', 0)->orderByRaw("RAND()")->take(8)->get();

    	$advertisements = Advertisement::where('blocked', 0)->with('media')->has('media')->orderByRaw("RAND()")->take(8)->get();
        $bids = Bid::paginate(8);

    	return view('farmersmarket.farmersmarket',compact(['users','advertisements', 'bids']));

    }

    public function getUserAdvertisements($id)
    {
        $user = User::find($id);
        return view('farmersmarket.user-my-advertisements', compact('user'));
    }

    public function getUserBids($id)
    {
        $bid = Bid::find($id);
        $user = User::find($id);
        return view('farmersmarket.user-my-bids',compact(['bid','user']));
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
    	$advertisements = Advertisement::where('blocked', 0)->orderBy('name','asc')->paginate(8);
        $options = ['name' => 'Name','available_on' => 'Date', 'price_cents' => 'Price'];

    	return view('farmersmarket.advertisements-all', compact(['advertisements','options']));
    }

    public function getRecentAdvertisements()
    {
        $advertisements = Advertisement::paginate(8);
        return view('farmersmarket.advertisements-mostrecent',compact('advertisements'));
    }
    
    public function getCreate()
    {
        $advertisement = new Advertisement();
        
        return view('farmersmarket.user-create-advertisement', compact('advertisement'));

    }
    
    public function postCreate(Request $request)
    {

         $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => 'required',
            'available_until' => 'required',
            

        ]);
        
        $advertisement = new Advertisement();

        $advertisement->name = $request->name;
        $advertisement->description = $request->description;
        $advertisement->available_on = $request->available_on;
        $advertisement->available_until = $request->available_until;
        $advertisement->price_cents = $request->price_cents;
        $advertisement->owner_id = Auth::user()->id;
        $advertisement->save();

        return redirect('/');
    }

    public function getAllOffers()
    {
        $advertisements = Advertisement::where('blocked', 0)->paginate(8);
        return view('farmersmarket.offers-all',compact('advertisements'));
    }

     public function getOfferProfile($id)
    {
        
        $advertisement = Advertisement::with('media')->find($id);

        return view('farmersmarket.offer-profile', compact('advertisement'));
           
    }

    public function getOfferDetails($id)
    {
        $bid = Bid::find($id);

        return view('farmersmarket.offer-details', compact('bid'));
    }


    public function getSearch(Request $request)
    {
        $query = trim($request->input('search'));


        $users = User::where('name', 'like' ,'%' . $query . '%')->having('blocked', '=', 0)->get();

        $location = User::where('location', 'like' ,'%' . $query . '%')->having('blocked', '=', 0)->get();

        $advertisements = Advertisement::where('name', 'like', '%' . $query . '%')->having('blocked', '=', 0)->get();


        $tags = Tag::where('name', 'like', '%' . $query . '%')->having('blocked', '=', 0)->get();
        $adTags = [];
        if(count($tags)){
            $adTags = $tags[0]->advertisements;

        }
       

        return view('farmersmarket.farmersmarket-search',compact(['users','location', 'advertisements', 'adTags']));   

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
