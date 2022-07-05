<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'surname'=>$data['surname'],
    //         'role'=>'student',
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register(Request $request)
    {

        $request->validate([
            'regname' => ['required', 'string', 'max:255'],
            'regsurname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@sosial\.gov\.az/i'],

            'regpassword' => ['required', 'string', 'min:8', 'same:regcpassword'],
        ]);
        $checkRole = $request->reginlineRadioOptions;
        // image crate
        $path = 'user/images/';
        $fontPath = public_path('fonts/Oliciy.ttf');
        $char = strtoupper($request->regname[0]);
        $newAvatarName =  rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;
        $createAvatar = \makeAvatar($fontPath, $dest, $char);
        $picture = $createAvatar == true ? $newAvatarName : '';

        $user = new User();
        $user->name = $request->regname;
        $user->surname = $request->regsurname;

        if($checkRole == "option1")
        {
            $user->role = 'student';
        }
        else if($checkRole == "option2")
        {
            $user->role = 'teacher';
        }

        $user->picture = $picture;

        $user->email = $request->email;
        $user->password = Hash::make($request->regpassword);


        if($user->save()){

            return redirect()->back()->with('success_register', 'You are now successfully registerd');
        }
        else{
            return redirect()->back()->with('error_register', 'Failed to register');
        }

    }
}
