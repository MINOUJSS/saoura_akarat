<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    public function __constract()
    {
        $this->middelware('guest:admin')->except('logout');
    }
    
    public function ShowLoginForm()
    {
        return view('auth.admin.login');
    }
    
    public function login(Request $request)
    {
        //validate form
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt to loged admin in 
        if(Auth::guard('admin')->attempt(['email'  =>$request->email , 'password' => $request->password],$request->remember))
        {
            //if success redirecte to intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        //if unsuccess redirect to login form with data
        return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
