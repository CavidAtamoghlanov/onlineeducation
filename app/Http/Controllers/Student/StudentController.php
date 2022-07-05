<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Answer;
use App\Models\DownloadFiles;
use App\Models\modul;
use App\Models\Sosial_media;
use App\Models\submodul;
use App\Models\telimler;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{

    public function index()
    {
        $telimler = telimler::all();
        $telimciler = User::where('role', 'teacher')->get();
        return view('student.dashboard', compact('telimler','telimciler'));
    }


    public function about()
    {
        $about = about::first();
        return view('student.about', compact('about'));
    }

    public function mentors()
    {
        $telimciler = User::where('role', 'teacher')->get();
        return view('student.mentors', compact('telimciler'));
    }

    public function telimler()
    {
        $moduls = modul::all();
        $submoduls = submodul::all();
        $telims = telimler::all();
        $selectTelim = telimler::first();
        $answer = Answer::where('student_id','=', Auth::user()->id)->where('telim_id','=',$selectTelim->id)->first();

        return view('student.telim', compact('moduls', 'telims', 'submoduls', 'selectTelim','answer'));
    }

    public function selectTelim($id)
    {
        $moduls = modul::all();
        $submoduls = submodul::all();
        $telims = telimler::all();
        $selectTelim = telimler::find($id);
        $answer = Answer::where('student_id','=', Auth::user()->id)->where('telim_id','=',$id)->first();



        if($selectTelim)
        {

            return view('student.telim', compact('moduls', 'telims', 'submoduls', 'selectTelim','answer'));
        }
        return redirect()->back();

    }

    public function studentProfil()
    {
        $moduls = modul::all();
        $answersss = Answer::where('student_id', '=', Auth::user()->id)->where('teqdim_edilen_cavablar', '!=', null)->get();
        $telimler = telimler::all();
        $answer = array();
        $answerArraytoarray = array();

        foreach($moduls as $modul)
        {


            $answer[$modul->id] = Answer::where('student_id','=',Auth::user()->id)->where('modul_id','=', $modul->id)->get();

        }
        // return dd($answer[1]);

        foreach($answer as $key=>$ans)
        {
            $dCVB = 0;
            $yCVB = 0;
            $sual_count = 0;
            foreach($ans as $a)
            {
                foreach($a->cavablarin_neticesi as $c)
                {
                    if($c == '0' || $c=='')
                    {
                        $yCVB += 1;
                    }
                    elseif($c == '1'){
                        $dCVB += 1;
                    }
                    $sual_count += 1;
                }


            }

            if ($ans->count() != 0)
            {
                $dCVBfaiz = ($dCVB*100)/($sual_count);
                $yCVBfaiz = ($yCVB*100)/($sual_count);
                $text_position = "Başlanqıc";
                if($dCVBfaiz<=100 && $dCVBfaiz>95){
                    $text_position = "Expert";
                }
                elseif($dCVBfaiz<=25 && $dCVBfaiz>0){
                    $text_position = "Başlanqıc";
                }
                elseif($dCVBfaiz<=50 && $dCVBfaiz>25){
                    $text_position = "Orta";
                }
                elseif($dCVBfaiz<=75 && $dCVBfaiz>50){
                    $text_position = "Qənaətbəxş";
                }
                elseif($dCVBfaiz<=95 && $dCVBfaiz>75){
                    $text_position = "Yuksek";
                }

                $answerArraytoarray[$key] = array('sualCount'=>$sual_count, 'dCVB'=>$dCVB, 'yCVB'=>$yCVB, 'dCVBfaiz'=>$dCVBfaiz,'yCVBfaiz'=>$yCVBfaiz, 'text_position'=>$text_position);
            }
            elseif($ans->count() == 0)
            {
                $text_position = "Başlanqıc";
                $answerArraytoarray[$key] = array('sualCount'=>$sual_count, 'dCVB'=>0, 'yCVB'=>10, 'dCVBfaiz'=>0,'yCVBfaiz'=>100,'text_position'=>$text_position);
            }

        }

        return view('student.profil', compact('telimler', 'moduls', 'answerArraytoarray','answersss'));
    }


    public function downloadFile(Request $request, $telim)
    {
        $telim = telimler::find($telim);

        if($telim->material)
        {


            return response()->download(public_path('user/materials/'.$telim->material));

  
        }
        return redirect()->back();
    }


    public function downloadQuestionFile(Request $request, $telim)
    {


        $id=$telim;
        $telim = telimler::find($id);

        if($telim->imtahan_suallari)
        {
            $check_download = DownloadFiles::where('student_id', '=', Auth::user()->id)->where('telim_id', '=', $id);
            if(!$check_download->count())
            {
                $download = new DownloadFiles();
                $download->student_id = Auth::user()->id;
                $download->telim_id = $telim->id;
                $download->yuklenme_tarixi = Carbon::now();
                if($download->save())
                {
                    $yoxlanilmis = [];
                    for ($x = 0; $x < $telim->sual_count; $x++) {
                        array_push($yoxlanilmis, '');
                      }
                    $cavab = new Answer();
                    $cavab->student_id = Auth::user()->id;
                    $cavab->teacher_id =$telim->user->id;
                    $cavab->telim_id = $id;
                    $cavab->modul_id = $telim->submodul->modul_id;
                    $cavab->submodul_id = $telim->submodul_id;
                    $cavab->teqdim_edilen_cavablar = null;
                    $cavab->cavablarin_neticesi = $yoxlanilmis;
                    $cavab->status_time = 0;
                    $cavab->suallarin_yuklenme_tarixi = null;
                    $cavab->save();


                }
            }
            return response()->download(public_path('user/materials/'.$telim->imtahan_suallari));
        }
        return redirect()->back();
    }

    public function selectMentor($id)
    {
        $mentor = User::where('role','=','teacher')->find($id);
        $telimler  = telimler::where("telimci_id", '=', $id)->get();
        return view('student.telimci', compact('mentor','telimler'));

    }


    public function cavabTeqdimi($id)
    {
        $telim = telimler::find($id);

        return view('student.cavab_teqdim_et', compact('telim'));
    }


    public function storeCavab(Request $request, $id)
    {

        $request->validate([
            "cavab.*" => 'required',


        ],[
           'cavab.*.required'=>'cavablar  bos  ola bilmez'
        ]);






        $telim = telimler::find($id);

        $yoxlanilmis = [];
        for ($x = 0; $x < $telim->sual_count; $x++) {
            array_push($yoxlanilmis, '');
        }

        $cavab = Answer::where('student_id','=', Auth::user()->id)->where('telim_id','=',$id)->first();
        if($cavab->count())
        {

            if(!$cavab->teqdim_edilen_cavablar)
            {
                $cavab->update([

                    'teqdim_edilen_cavablar'=>$request->cavab,
                    'suallarin_yuklenme_tarixi'=>Carbon::now()


                ]);
            }
            else{
                return redirect()->back()->with('error', 'Test artiq cavablandirilib');

            }

            return redirect()->back()->with('success', 'cavab teqdim edildi');
        }


        return redirect()->back()->with('error', 'Test movcud  deyil');
    }

    public function updatePassword(Request $request)
    {
        // validate form
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>['required',function($attribute, $value, $fail){
                if(!\Hash::check($value, Auth::user()->password))
                {
                    return $fail(__('The current password is incorrect'));
                }
            },
            'min:8',
            'max:30',
        ],
        'newpassword'=>'required|min:8|max:30',
        'cnewpassword'=>'required|same:newpassword'
        ],
        [
            'oldpassword.required'=>'kohne passwordunuzu daxil edin',
            'oldpassword.min'=>'minimum 8 symbol olmalidir',
            'oldpassword.max'=>'maxsimum 30 symbol',
            'newpassword.required'=> 'yeni sifre daxil edin',
            'newpassword.min'=>'minimum 8 symbol olmalidir',
            'newpassword.max' => 'maxsimum 30 symbol',
            'cnewpassword.required'=>'passwordu tekrar daxil edin',
            'cnewpassword.same'=> 'Password eyni olmalidir'

        ]);

        if(!$validator->passes())
        {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if(!$update)
            {
                return response()->json(['status'=>0, 'msg'=>'Somethings went wrong']);
            }
            else
            {
                return response()->json(['status'=>1, 'msg'=>'password yenilendi']);
            }
        }
    }

    public function updateProfilImage(Request $request)
    {
        $path = 'user/images/';
        $file = $request->file('student_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        // upload new image
        $upload = $file->move(public_path($path), $new_name);

        if(!$upload)
        {
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, upload new picture failed.']);
        }
        else
        {
             //Get Old picture
             $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

             if( $oldPicture != '' ){
                 if( \File::exists(public_path($path.$oldPicture))){
                     \File::delete(public_path($path.$oldPicture));
                 }
             }

             //Update DB
             $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

             if( !$upload ){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
             }
        }
    }




}
