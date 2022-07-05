<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if(Auth()->user()->role == 'admin'){
            return route('admin.dashboard');
        }
        elseif(Auth()->user()->role == 'student'){
            return route('student.dashboard');
        }
        elseif(Auth()->user()->role == 'teacher'){
            return route('teacher.addTelim');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'loginemail' => ['required', 'email', 'regex:/(.*)@sosial\.gov\.az/i'],
            'password'=>'required'
        ]);

        if(auth()->attempt(array('email'=>$input['loginemail'], 'password'=>$input['password'], 'status' => 1))){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role == 'student'){
                return redirect()->route('student.dashboard');
            }
            elseif(auth()->user()->role == 'teacher'){
                return redirect()->route('teacher.addTelim');
            }
        }
        else{
            return redirect()->route('welcome')->with('error_login', 'Email and password are wrong');
        }
    }



}
