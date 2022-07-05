<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Answer;
use App\Models\Elaqe;
use App\Models\modul;
use App\Models\Sosial_media;
use App\Models\submodul;
use App\Models\telimler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

    public function addTelim()
    {
        $moduls = modul::all();
        $submoduls = submodul::all();
        return view('teacher.pages.add_telim', compact('moduls', 'submoduls'));
    }


    public function profil()
    {
        return view('teacher.pages.profil');

    }




    public function storeModul(Request $request)
    {
        $request->validate([
            'modulname' => ['required', 'string', 'max:255'],
        ]);

        $modul = new modul();
        $modul->name = $request->modulname;
        $modul->telimci_id	= Auth::user()->id;



        if($modul->save()){
            return redirect()->back()->with('success_modul', ''.$modul->name.' elave edildi');
        }
        else{
            return redirect()->back()->with('error_modul', 'Yeniden yoxlayin!');
        }
    }


    public function storeSubModul(Request $request)
    {
        $request->validate([
            'submodulname' => ['required', 'string', 'max:255'],
            'select_modul' => ['required', 'integer','exists:moduls,id']
        ]);

        $submodul = new submodul();
        $submodul->name = $request->submodulname;
        $submodul->modul_id = $request->select_modul;
        $submodul->telimci_id	= Auth::user()->id;



        if($submodul->save()){
            return redirect()->back()->with('success_submodul', ''.$submodul->name.' elave edildi');
        }
        else{
            return redirect()->back()->with('error_submodul', 'Yeniden yoxlayin!');
        }


    }

    public function storeTelim(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sortdesc' => ['required', 'string','max:60'],
            'InputDesc' => ['required', 'string'],
            'selectimage' => ['image','mimes:jpeg,png,jpg','max:2048'],
            'selectmaterial' => ['mimes:doc,docx,pdf'],
            'selectSualFile' => ['mimes:doc,docx,pdf'],
            'vidolink' => ['required', 'string', 'max:255'],
            'selectsubmodul' => ['required', 'integer','exists:submoduls,id'],
            'questioncount' => ['required', 'integer', 'min:5', 'max:20']

        ]);

        $image = $request->selectimage;
        $imageName = rand(12,34353).time().'_'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
        $request->selectimage->move('user/materials', $imageName);

        $materialName = null;
        if($request->selectmaterial)
        {
            $material = $request->selectmaterial;
            $materialName = rand(12,34353).time().'_'.$material->getClientOriginalName().'.'.$material->getClientOriginalExtension();
            $request->selectmaterial->move('user/materials', $materialName);
        }

        $suallarlName = null;
        if($request->selectSualFile)
        {
            $suallar = $request->selectSualFile;
            $suallarlName = rand(12,34353).time().'_'.$suallar->getClientOriginalName().'.'.$suallar->getClientOriginalExtension();
            $request->selectSualFile->move('user/materials', $suallarlName);
        }



        $telim = new telimler();
        $telim->name = $request->name;
        $telim->submodul_id	= $request->selectsubmodul;
        $telim->telimci_id	= Auth::user()->id;
        $telim->short_desc = $request->sortdesc;
        $telim->desc = $request->InputDesc;
        $telim->picture = $imageName;
        $telim->video_link = $request->vidolink;
        $telim->material = $materialName;
        $telim->imtahan_suallari = $suallarlName;
        $telim->sual_count = $request->questioncount;


        if($telim->save()){
            return redirect()->back()->with('success_telim', ''.$telim->name.' elave edildi');
        }
        else{
            return redirect()->back()->with('error_telim', 'Yeniden yoxlayin!');
        }





    }


    public function updateProfilInfo(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'surname'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,

        ]);

        if(!$validator->passes())
        {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'email'=>$request->email,
            ]);

            if(!$query)
            {
                return response()->json(['status'=>0, 'msg'=>'Something went wrong']);
            }
            else
            {
                return response()->json(['status'=>1, 'msg'=>'Your profile info been update successfuly']);
            }

        }

    }


    public function updateProfilImage(Request $request)
    {
        $path = 'user/images/';
        $file = $request->file('admin_image');
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

    public function checkResault()
    {
        $answers = Answer::where('teacher_id','=', Auth::user()->id)->get();
        return view('teacher.pages.check_result', compact('answers'));
    }

    public function delet_user_answer($id)
    {
        $answer = Answer::find($id);
        $answer->update([
            'status_time' => 1,

        ]);

        if($answer->update()){

            return redirect()->back()->with('success_answer', 'Edit edildi');
        }
        else{
            return redirect()->back()->with('error_answer', 'edit edilmedi');
        }
    }

    public function delet_user_answer_from_database($id)
    {
        $answer = Answer::find($id)->delete();

            return redirect()->back()->with('success_answer', 'silindi edildi');

    }

    public function check_answer($id)
    {
        $answer = Answer::find($id);
        return view('teacher.pages.check_user_resualt', compact('answer'));


    }



    public function check_correct_answer($id, $checkid)
    {
        $answer = Answer::find($id);
        $cvb = $answer->cavablarin_neticesi;
        $cvb[$checkid-1] = "1";
        $answer->update([
            'cavablarin_neticesi'=>$cvb,
        ]);

        if($answer->update())
        {
            return redirect()->back();
        }
    }

    public function check_notcorrect_answer($id, $checkid)
    {
        $answer = Answer::find($id);
        $cvb = $answer->cavablarin_neticesi;
        $cvb[$checkid-1] = "0";
        $answer->update([
            'cavablarin_neticesi'=>$cvb,
        ]);

        if($answer->update())
        {
            return redirect()->back();
        }
    }



}
