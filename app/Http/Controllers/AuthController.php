<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $guard = 'my_user';

    protected $loginView = 'auth.user_page.newLogin';

    protected $registerView = 'auth.user_page.register';


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
            'name' => 'max:255',
            'phone' => 'required|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Users
     */
    protected function create(array $data)
    {
        return Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login(Request $request){
        if (auth()->guard('my_user')->attempt(['phone'=>$request['phone'], 'password'=>$request['password']])){
            return redirect()->intended('/');
        }
        else {
            return back()->withErrors($this->validator($request->all()))->withInput();
        }
    }
}
