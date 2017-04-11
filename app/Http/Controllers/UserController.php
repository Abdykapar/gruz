<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use App\Users;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mockery\Matcher\Closure;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function create(Request $request){
        $a = validator($request->all(), [
            'phone' => 'required|unique:posts|min:12',
            'password' => 'required|min:6|confirmed',
        ]);
        Users::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password'])
        ])->save();
        return redirect(url('registration'));
    }

    public function index(){
        dd($_REQUEST);
        return view('auth/user_page/login');
    }
    public function sign(Request $request){
        if (auth()->guard('my_user')->attempt(['phone' => $request['phone'], 'password' => $request['password']])){
            return auth()->guard('my_user')->user();
        }
        else {
            dd($request->all());
        }
        return view('auth/user_page/login');
    }

    public function register(){
        return view('auth/user_page/register');
    }

    public function sign_out(){
        auth()->guard('my_user')->logout();
        return Redirect::back();
    }
}
