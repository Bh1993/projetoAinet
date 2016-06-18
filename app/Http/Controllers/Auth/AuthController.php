<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'location' => $data['location'],
            'admin' => 0, // Verificar se aqui é 0 ou '0'
            'blocked' => 1, // Verificar se aqui é 0 ou '0'
        ]);

        $user->save();

        Mail::send('auth.emails.verify', ['user' => $user], function($message) use ($user)
        {
        $message->from('farmersmarketbbj@gmail.com', "Farmers Market");
        $message->subject("Farmers Market - Confirm your account");
        $message->to($user->email);
        });

        return $user;
    }

    

}
    /*
    protected function getLogin()
    {
        return view('login');
    }
    */
   
   /* protected function postLogin(Request $request)
   {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|pass',
        ]);

        $user = Auth::user();

        return redirect('/');
   }

   protected function getLogout()
   {
       Auth::logout();
       return redirect('/');
   }

   protected function getRegister()
   {
       return view('register');
   }

   protected function postRegister(Request $request)
   {
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',

        ]);

        $user = $this->create($request->all());

        $user->save();
        return redirect('/'); 
   }
}
