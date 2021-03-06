<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;


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

    public function confirmEmail($id)
    {
        $user = User::find($id);
        $user->blocked = 0;
        $user->save();

        return redirect('/');
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
        
        if ($request->profile_photo == '') {
           $user->profile_photo = 'cenas';
        }
       
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

    public function postDashboardBlock(User $user)
    {
        if ($user->blocked == 0) {
            $user->blocked = 1;
        } else {
            $user->blocked = 0;
        }
        
        $ads = $user->advertisements()->get();
        $comments = $user->comments()->get();

        if (count($ads)) {
            foreach ($ads as $ad) {
                $ad->blocked = 1;
                $ad->save();
            }
        }

        if (count($comments)) {
            foreach ($comments as $comment) {
                $comment->blocked = 1;
                $comment->save();
            }
        }

    
        $user->save();

        return redirect('users');

    }

    public function getAllBlocked()
    {
        $users = User::where('blocked', 1)->orderBy('name','asc')->paginate(10);
        $options = ['name' => 'Name','email' => 'Email'];

        return view('users.list', compact(['users','options']));
    }

    public function getAllAdmin()
    {
        $users = User::where('admin', 1)->orderBy('name', 'asc')->paginate(10);
        $options = ['name' => 'Name', 'email' => 'Email'];

        return view('users.list', compact(['users', 'options']));
    }

    public function assignAdmin(User $user)
    {
        if ($user->admin == 0 && $user->blocked == 0) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }

        $user->save();

        return redirect('users');
    }

}
