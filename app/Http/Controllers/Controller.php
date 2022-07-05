<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Sosial_media;
use App\Models\telimler;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if(Auth::user())
        {

            return redirect()->route('student.dashboard');
        }
        else
        {

            $telimler = telimler::all();
            $telimciler = User::where('role','=', 'teacher')->get();

            return view('welcome', compact('telimler','telimciler'));
        }
    }


    public function about()
    {

        $about = about::first();
        return view('about', compact('about'));
    }

    public function mentors()
    {
        $telimciler = User::where('role','=','teacher')->get();
        return view('mentors', compact('telimciler'));
    }


    public function selectMentor($id)
    {
        $mentor = User::where('role','=','teacher')->find($id);
        $telimler  = telimler::where("telimci_id", '=', $id)->get();
        return view('mentor', compact('mentor','telimler'));
    }


}
