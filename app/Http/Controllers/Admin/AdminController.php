<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Answer;
use App\Models\Elaqe;
use App\Models\modul;
use App\Models\Sosial_media;
use App\Models\submodul;
use App\Models\telimler;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index()
    {
        $telimler = telimler::count();
        $teachers = User::where('role','=', 'teacher')->count();
        $students = User::where('role','=', 'student')->count();

        return view('admin.dashboard', compact('telimler', 'teachers', 'students'));

    }


    public function addTeacher()
    {
        return view('admin.pages.add_teacher');

    }

    public function addStudent()
    {
        return view('admin.pages.add_student');

    }

    public function addTelim()
    {
        $moduls = modul::all();
        $submoduls = submodul::all();
        return view('admin.pages.add_telim', compact('moduls', 'submoduls'));

    }

    public function profil()
    {
        return view('admin.pages.profile');

    }

    public function sendNotification()
    {
        return view('admin.pages.send_notification');

    }

    public function allTeacher()
    {
        $teachers = User::where('role', 'teacher')->where('deleted_by','=', 0)->where('status','=', 1)->get();
        return view('admin.pages.all_teacher', compact('teachers'));
    }

    public function allStudent()
    {
        $students = User::where('role', 'student')->where('deleted_by','=', 0)->where('status','=', 1)->get();

        return view('admin.pages.all_student', compact('students'));
    }

    public function allTelim()
    {
        $moduls = modul::all();
        $submoduls = submodul::all();
        $telimler = telimler::all();

        return view('admin.pages.all_telim', compact('moduls','submoduls','telimler'));

    }


    public function istifadeciTesdiqi()
    {
        $users = User::where('status', '=', 0)->where('deleted_by','=',0)->get();
        return view('admin.pages.istifadeci_tesdiqi', compact('users'));
    }



    public function siteEditing()
    {
        $about = about::first();
        $sosial_medias = Sosial_media::all();
        $elaqeler = Elaqe::all();

        return view('admin.pages.site_editing', compact('about', 'sosial_medias', 'elaqeler'));

    }


    public function imtahanneticeleri()
    {
        $submoduls = submodul::all();
        $answers = Answer::all();
        return view('admin.pages.imtahanneticeleri', compact('submoduls','answers'));
    }

    public function submodul_resualt($id)
    {
        $answers = Answer::where('submodul_id', '=', $id)->where('teqdim_edilen_cavablar', '!=', null)->get();

        $submoduls = submodul::all();
        $allstudent = User::where('role', '=', 'student')->get();
        $answer = array();
        $answerArraytoarray = array();

        foreach($allstudent as $student)
        {
            $answer[$student->id] = Answer::where('student_id','=', $student->id)->where('submodul_id','=', $id)->where('teqdim_edilen_cavablar', '!=', null)->get();

        }
        // return dd($answer[7]);
        $sual_count = 0;
        foreach($answer as $key=>$ans)
        {
            $dCVB = 0;
            $yCVB = 0;
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
            // return dd($dCVB, $yCVB);
            if ($ans->count() != 0)
            {
                $dCVBfaiz = ($dCVB*100)/($sual_count);
                $yCVBfaiz = ($yCVB*100)/($sual_count);


                $answerArraytoarray[$key] = array('sualCount'=>$sual_count, 'dCVB'=>$dCVB, 'yCVB'=>$yCVB, 'dCVBfaiz'=>$dCVBfaiz,'yCVBfaiz'=>$yCVBfaiz);
            }
            elseif($ans->count() == 0)
            {
                $answerArraytoarray[$key] = array('sualCount'=>$sual_count, 'dCVB'=>0, 'yCVB'=>10, 'dCVBfaiz'=>0,'yCVBfaiz'=>100);
            }

        }


        return view('admin.pages.imtahanneticeleri_submodul', compact('answers', 'answerArraytoarray'));

    }

    public function reser_exam($student_id, $answer_id)
    {

        $answer = Answer::find($answer_id);

        $yoxlanilmis = [];
        for ($x = 0; $x < $answer->telim->sual_count; $x++) {
            array_push($yoxlanilmis, '');
        }

        $answer->update([
            "teqdim_edilen_cavablar"=>null,
            "cavablarin_neticesi"=>$yoxlanilmis,
        ]);

        if($answer->update()){
        return redirect()->back()->with('success', $answer->student->name.' Telebe yeniden imtahan  vere biler');
        }
        else{
            return redirect()->back()->with('error', 'telebenin yeniden  imtahan  vermesi  alinmadi');

        }
    }


    public function storeTeacher(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@sosial\.gov\.az/i'],
            'subject' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'same:cpassword'],
            'cpassword' => ['required', 'same:password']
        ]);

        // image crate
        $path = 'user/images/';
        $fontPath = public_path('fonts/Oliciy.ttf');
        $char = strtoupper($request->name[0]);
        $newAvatarName =  rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;
        $createAvatar = \makeAvatar($fontPath, $dest, $char);
        $picture = $createAvatar == true ? $newAvatarName : '';

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->role = 'teacher';
        $user->subject = $request->subject;
        $user->position = $request->position;
        $user->picture = $picture;
        $user->email = $request->email;
        $user->status = 1;
        $user->deleted_by = 0;
        $user->password = Hash::make($request->password);


        if($user->save()){
            return redirect()->back()->with('success', 'Elave olundu!');
        }
        else{
            return redirect()->back()->with('error', 'Yeniden yoxlayin!');
        }
    }


    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@sosial\.gov\.az/i'],

            'password' => ['required', 'string', 'min:8', 'same:cpassword'],
            'cpassword' => ['required', 'same:password']
        ]);

        // image crate
        $path = 'user/images/';
        $fontPath = public_path('fonts/Oliciy.ttf');
        $char = strtoupper($request->name[0]);
        $newAvatarName =  rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;
        $createAvatar = \makeAvatar($fontPath, $dest, $char);
        $picture = $createAvatar == true ? $newAvatarName : '';

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->role = 'student';
        $user->status = 1;
        $user->deleted_by = 0;
        $user->picture = $picture;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($user->save()){
            return redirect()->back()->with('success', 'Elave olundu!');
        }
        else{
            return redirect()->back()->with('error', 'Yeniden yoxlayin!');
        }
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


    public function changeAbout(Request $request, $id)
    {
        $request->validate([
            'description' => ['required'],

        ]);

        $about = about::find($id);
        $about->update([
            'description' => $request->description,

        ]);

        if($about->update()){
            return redirect()->back()->with('success_desc', 'Edit edildi');
        }
        else{
            return redirect()->back()->with('error_desc', 'edit edilmedi');
        }
    }



    public function changeSocialMedia(Request $request, $id)
    {
        $request->validate([
            'social_media' => ['required'],

        ]);

        $social_media = Sosial_media::find($id);
        $social_media->update([
            'link' => $request->social_media

        ]);

        if($social_media->update()){
            return redirect()->back()->with('success_social', ''.$social_media->name.' Edit edildi');
        }
        else{
            return redirect()->back()->with('error_social', 'edit edilmedi');
        }

    }


    public function changeElaqe(Request $request, $id)
    {
        $request->validate([
            'elaqe' => ['required'],

        ]);

        $elaqe = Elaqe::find($id);
        $elaqe->update([
            'email' => $request->elaqe

        ]);

        if($elaqe->update()){
            return redirect()->back()->with('success_elaqe', ''.$elaqe->name.' Edit edildi');
        }
        else{
            return redirect()->back()->with('error_elaqe', 'edit edilmedi');
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


    public function deletTeacher($id)
    {
        User::where('id',$id)->update(['deleted_by'=>1]);


        return redirect()->back()->with("success", "muellim silindi");
    }


    public function editTeacher($id)
    {
        $teacher = User::find($id);

        return view('admin.pages.edit_teacher', compact('teacher'));
    }


    public function updateTeacher(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'subject' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],

        ]);



        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'subject' => $request->subject,
            'position' => $request->position,
        ]);

        if($user->update()){
            return redirect()->back()->with('success_info', ''.$user->name.' Edit edildi');
        }
        else{
            return redirect()->back()->with('error_info', 'Yeniden yoxlayin!');
        }
    }


    public function updateTeacherPassword(Request $request)
    {
        $request->validate([

        'newpassword'=>'required|min:8|max:30',
        'cnewpassword'=>'required|same:newpassword'
        ],
        [
            'newpassword.required'=> 'yeni sifre daxil edin',
            'newpassword.min'=>'minimum 8 symbol olmalidir',
            'newpassword.max' => 'maxsimum 30 symbol',
            'cnewpassword.required'=>'passwordu tekrar daxil edin',
            'cnewpassword.same'=> 'Password eyni olmalidir'

        ]);



        $update = User::find($request->id)->update(['password'=>\Hash::make($request->newpassword)]);

        if($update)
        {
            return redirect()->back()->with('success_info', 'Password Edit edildi');
        }
        else
        {
            return redirect()->back()->with('error_info', 'password edit edilmedi. Yeniden yoxlayin!');
        }



    }



    public function deletStudent(Request $request, $id)
    {
        User::where('id',$id)->update(['deleted_by'=>1]);


        return redirect()->back()->with("success", "Telebe silindi");
    }

    public function editStudent($id)
    {
        $student = User::find($id);

        return view('admin.pages.edit_student', compact('student'));
    }


    public function updateStudent(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],


        ]);



        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,

        ]);

        if($user->update()){
            return redirect()->back()->with('success_info', ''.$user->name.' Edit edildi');
        }
        else{
            return redirect()->back()->with('error_info', 'Yeniden yoxlayin!');
        }
    }


    public function updateStudentPassword(Request $request)
    {
        $request->validate([

        'newpassword'=>'required|min:8|max:30',
        'cnewpassword'=>'required|same:newpassword'
        ],
        [
            'newpassword.required'=> 'yeni sifre daxil edin',
            'newpassword.min'=>'minimum 8 symbol olmalidir',
            'newpassword.max' => 'maxsimum 30 symbol',
            'cnewpassword.required'=>'passwordu tekrar daxil edin',
            'cnewpassword.same'=> 'Password eyni olmalidir'

        ]);



        $update = User::find($request->id)->update(['password'=>\Hash::make($request->newpassword)]);

        if($update)
        {
            return redirect()->back()->with('success_info', 'Password Edit edildi');
        }
        else
        {
            return redirect()->back()->with('error_info', 'password edit edilmedi. Yeniden yoxlayin!');
        }



    }


    public function deletModul($id)
    {
        // foregn key vasitesi  ile  modul silindikde  butun hersey silinir
        Modul::where('id',$id)->delete();
        return redirect()->back()->with("success", "modul silindi");

    }


    public function editModul($id)
    {
        $modul = modul::find($id);
        return view('admin.pages.edit_modul', compact('modul'));

    }

    public function updateModul(Request $request)
    {
        $request->validate([
            'modulname' => ['required', 'string', 'max:255'],
        ]);


        $update = modul::find($request->id)->update(['name'=>$request->modulname]);

        if($update)
        {
            return redirect()->back()->with('success_info', 'modul Edit edildi');
        }
        else
        {
            return redirect()->back()->with('error_info', 'modul edit edilmedi. Yeniden yoxlayin!');
        }

    }


    public function deletSubModul($id)
    {
        // foregn key vasitesi  ile  modul silindikde  butun hersey silinir
        submodul::where('id',$id)->delete();
        return redirect()->back()->with("success", "modul silindi");
    }

    public function editSubModul($id)
    {
        $moduls = modul::all();
        $submodul = submodul::find($id);
        return view('admin.pages.edit_submodul', compact('moduls','submodul'));
    }

    public function updateSubModul(Request $request)
    {

        $request->validate([
            'submodulname' => ['required', 'string', 'max:255'],
            'select_modul' => ['required', 'integer','exists:moduls,id'],
            'id' => ['required', 'integer','exists:submoduls,id']
        ]);

        $update = submodul::find($request->id)->update([
            'name'=>$request->submodulname,
            'modul_id'=>$request->select_modul,
        ]);

        if($update)
        {
            return redirect()->back()->with('success_info', 'submodul Edit edildi');
        }
        else
        {
            return redirect()->back()->with('error_info', 'submodul edit edilmedi. Yeniden yoxlayin!');
        }


    }



    public function delettelim($id)
    {
        // foregn key vasitesi  ile  modul silindikde  butun hersey silinir
        telimler::where('id',$id)->delete();
        return redirect()->back()->with("success", "telim silindi");
    }


    public function editTelim($id)
    {
        $telim = telimler::find($id);
        $submoduls = submodul::all();
        return view('admin.pages.edit_telim', compact('telim','submoduls'));


    }


    public function updateTelim(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sortdesc' => ['required', 'string','max:60'],
            'InputDesc' => ['required', 'string'],
            'selectimage' => ['image','mimes:jpeg,png,jpg','max:2048'],
            'selectmaterial' => ['mimes:doc,docx,pdf'],
            'selectSualFile' => ['mimes:doc,docx,pdf'],
            'vidolink' => ['required', 'string', 'max:255'],
            'selectsubmodul' => ['required', 'integer','exists:submoduls,id']
        ]);

        $path = 'user/materials/';
        $telim_indiki =telimler::find($request->id);

        $image = $request->selectimage;
        if($image != null)
        {
            //Get Old material
            $oldMaterial = $telim_indiki->getAttributes()['picture'];

            if( $oldMaterial != '' ){
                if( \File::exists(public_path($path.$oldMaterial))){
                    \File::delete(public_path($path.$oldMaterial));
                }
            }
            $imageName = rand(12,34353).time().'_'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
            $request->selectimage->move('user/materials', $imageName);

        }
        else
        {
            $image = null;
            $imageName = $telim_indiki->picture;
        }


        $materialName = null;
        if($request->selectmaterial)
        {

            $material = $request->selectmaterial;

            //Get Old material
            $oldMaterial = $telim_indiki->getAttributes()['material'];

            if( $oldMaterial != '' ){
                if( \File::exists(public_path($path.$oldMaterial))){
                    \File::delete(public_path($path.$oldMaterial));
                }
            }

            $materialName = rand(12,34353).time().'_'.$material->getClientOriginalName().'.'.$material->getClientOriginalExtension();
            $request->selectmaterial->move('user/materials', $materialName);


        }
        else
        {
            $materialName = $telim_indiki->material;
        }

        $suallarlName = null;
        if($request->selectSualFile)
        {
            $suallar = $request->selectSualFile;

            //Get Old material
            $oldMaterial = $telim_indiki->getAttributes()['imtahan_suallari'];

            if( $oldMaterial != '' ){
                if( \File::exists(public_path($path.$oldMaterial))){
                    \File::delete(public_path($path.$oldMaterial));
                }
            }
            $suallarlName = rand(12,34353).time().'_'.$suallar->getClientOriginalName().'.'.$suallar->getClientOriginalExtension();
            $request->selectSualFile->move('user/materials', $suallarlName);

        }
        else
        {
            $suallarlName = $telim_indiki->imtahan_suallari;
        }




        $update = $telim_indiki->update([
            'name'=>$request->name,
            'submodul_id'=>$request->selectsubmodul,
            'short_desc'=>$request->sortdesc,
            'desc'=>$request->InputDesc,
            'picture'=>$imageName,
            'material'=>$materialName,
            'video_link'=>$request->vidolink,
            'imtahan_suallari'=>$suallarlName,





        ]);

        if($update)
        {
            return redirect()->back()->with('success_telim', 'telim Edit edildi');
        }
        else
        {
            return redirect()->back()->with('error_telim', 'telim edit edilmedi. Yeniden yoxlayin!');
        }



    }


    public function successUser($id)
    {
        $update = User::find($id)->update([
            'status'=>1,
        ]);

        if($update)
        {
            return redirect()->back()->with('success_user', 'elave edildi');
        }
        else
        {
            return redirect()->back()->with('error_user', 'elave edilmedi. Yeniden yoxlayin!');
        }
    }


    public function deletUser($id)
    {
        $delet = User::find($id)->delete();
        if($delet)
        {
            return redirect()->back()->with('success_user', 'silindi');
        }
        else
        {
            return redirect()->back()->with('error_user', 'silinmedi');
        }

    }






}
