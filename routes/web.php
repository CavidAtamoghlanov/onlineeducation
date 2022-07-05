<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Controller::class, 'index'])->name('welcome');

Route::get('/about', [Controller::class, 'about'])->name('about');

Route::get('/mentors', [Controller::class, 'mentors'])->name('mentors');

Route::get('mentor/{id}', [Controller::class, 'selectMentor'])->name('selectMentor');















Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('addteacher', [AdminController::class, 'addTeacher'])->name('admin.addteacher');
    Route::get('addstudent', [AdminController::class, 'addStudent'])->name('admin.addstudent');
    Route::get('addtelim', [AdminController::class, 'addTelim'])->name('admin.addtelim');
    Route::get('profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::get('allteacher', [AdminController::class, 'allTeacher'])->name('admin.allteacher');
    Route::get('allstudent', [AdminController::class, 'allStudent'])->name('admin.allstudent');
    Route::get('alltelim', [AdminController::class, 'allTelim'])->name('admin.alltelim');
    Route::get('accept-user', [AdminController::class, 'istifadeciTesdiqi'])->name('admin.istifadeciTesdiqi');
    Route::get('examp-resualt', [AdminController::class, 'imtahanneticeleri'])->name('admin.imtahanneticeleri');
    Route::get('examp-resualt/{id}', [AdminController::class, 'submodul_resualt'])->name('admin.imtahanneticeleri_submodul');
    Route::get('exam_reset/{student_id}/{answer_id}', [AdminController::class, 'reser_exam'])->name('admin.resetexam');


    Route::get('sendnotification', [AdminController::class, 'sendNotification'])->name('admin.sendnotification');
    Route::get('siteediting', [AdminController::class, 'siteEditing'])->name('admin.siteediting');


    Route::post('storteacher', [AdminController::class, 'storeTeacher'])->name('admin.storeteacher');
    Route::post('storstudent', [AdminController::class, 'storeStudent'])->name('admin.storestudent');
    Route::post('stormodul', [AdminController::class, 'storeModul'])->name('admin.storemodul');
    Route::post('storesubmodul', [AdminController::class, 'storeSubModul'])->name('admin.storesubmodul');

    Route::post('stortelim', [AdminController::class, 'storeTelim'])->name('admin.storetelim');


    Route::post('changeabout/{id}', [AdminController::class, 'changeAbout'])->name('admin.changeabout');

    Route::post('changesocialmedia/{id}', [AdminController::class, 'changeSocialMedia'])->name('admin.changesocialmedia');

    Route::post('changeelaqe/{id}', [AdminController::class, 'changeElaqe'])->name('admin.changeelaqe');



    Route::post('update-profile-info',[AdminController::class, 'updateProfilInfo'])->name('admin.UpdateProfilInfo');
    Route::post('change-profile-image',[AdminController::class, 'updateProfilImage'])->name('admin.UpdateProfilImage');
    Route::post('update-password',[AdminController::class, 'updatePassword'])->name('admin.UpdatePassword');


    Route::get('delete-teacher/{id}', [AdminController::class, 'deletTeacher'])->name('admin.deletTeacher');
    Route::get('edit-teacher/{id}', [AdminController::class, 'editTeacher'])->name('admin.editTeacher');
    Route::post('update-teacher', [AdminController::class, 'updateTeacher'])->name('admin.updateTeacher');
    Route::post('update-teacher-password', [AdminController::class, 'updateTeacherPassword'])->name('admin.updateTeacherPassword');


    Route::get('delete-student/{id}', [AdminController::class, 'deletStudent'])->name('admin.deletStudent');
    Route::get('edit-student/{id}', [AdminController::class, 'editStudent'])->name('admin.editStudent');
    Route::post('update-student', [AdminController::class, 'updateStudent'])->name('admin.updateStudent');
    Route::post('update-student-password', [AdminController::class, 'updateStudentPassword'])->name('admin.updateStudentPassword');



    Route::get('delete-modul/{id}', [AdminController::class, 'deletModul'])->name('admin.deletModul');
    Route::get('edit-modul/{id}', [AdminController::class, 'editModul'])->name('admin.editModul');
    Route::post('update-modul', [AdminController::class, 'updateModul'])->name('admin.updateModul');


    Route::get('delete-submodul/{id}', [AdminController::class, 'deletSubModul'])->name('admin.deletSubModul');
    Route::get('edit-submodul/{id}', [AdminController::class, 'editSubModul'])->name('admin.editSubModul');
    Route::post('update-submodul', [AdminController::class, 'updateSubModul'])->name('admin.updateSubModul');


    Route::get('delete-telim/{id}', [AdminController::class, 'delettelim'])->name('admin.delettelim');
    Route::get('edit-telim/{id}', [AdminController::class, 'editTelim'])->name('admin.editTelim');
    Route::post('update-telim', [AdminController::class, 'updateTelim'])->name('admin.updateTelim');

    Route::get('success-user/{id}', [AdminController::class, 'successUser'])->name('admin.successUser');
    Route::get('delete-user/{id}', [AdminController::class, 'deletUser'])->name('admin.deletUser');


});


Route::group(['prefix'=>'student', 'middleware'=>['isStudent','auth', 'PreventBackHistory','verified']], function(){
    Route::get('dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    Route::get('about', [StudentController::class, 'about'])->name('student.about');

    Route::get('mentors', [StudentController::class, 'mentors'])->name('student.mentors');

    Route::get('mentors/{id}', [StudentController::class, 'selectMentor'])->name('student.selectMentor');

    Route::get('telim', [StudentController::class, 'telimler'])->name('student.telimler');

    Route::get('profil', [StudentController::class, 'studentProfil'])->name('student.profil');

    Route::get('telim/{id}', [StudentController::class, 'selectTelim'])->name('student.selecttelim');
    Route::get('download/{telim}',[StudentController::class, 'downloadFile'])->name('student.downloadFile');
    Route::get('download/question_file/{telim}',[StudentController::class, 'downloadQuestionFile'])->name('student.downloadFile');

    Route::get('cavab-teqdimi/{id}', [StudentController::class, 'cavabTeqdimi'])->name('student.cavabTeqdimi');
    Route::post('upload-cavab-teqdimi/{id}', [StudentController::class, 'storeCavab'])->name('student.storeCavab');

    Route::post('update-password',[StudentController::class, 'updatePassword'])->name('student.UpdatePassword');
    Route::post('change-profile-image',[StudentController::class, 'updateProfilImage'])->name('student.UpdateProfilImage');


});



Route::group(['prefix'=>'teacher', 'middleware'=>['isTeacher','auth', 'PreventBackHistory']], function(){
    Route::get('add-telim', [TeacherController::class, 'addTelim'])->name('teacher.addTelim');
    Route::post('stormodul', [TeacherController::class, 'storeModul'])->name('teacher.storemodul');
    Route::post('storesubmodul', [TeacherController::class, 'storeSubModul'])->name('teacher.storesubmodul');
    Route::post('stortelim', [TeacherController::class, 'storeTelim'])->name('teacher.storetelim');
    Route::get('profil', [TeacherController::class, 'profil'])->name('teacher.profil');
    Route::get('check-resault', [TeacherController::class, 'checkResault'])->name('teacher.checkResault');

    Route::post('update-profile-info',[TeacherController::class, 'updateProfilInfo'])->name('teacher.UpdateProfilInfo');
    Route::post('change-profile-image',[TeacherController::class, 'updateProfilImage'])->name('teacher.UpdateProfilImage');
    Route::post('update-password',[TeacherController::class, 'updatePassword'])->name('teacher.UpdatePassword');
    Route::get('delet-user-answer/{id}',[TeacherController::class, 'delet_user_answer'])->name('teacher.delet_user_answer');
    Route::get('delet-user-answer-fromdatabase/{id}',[TeacherController::class, 'delet_user_answer_from_database'])->name('teacher.delet_user_answer_from_database');


    Route::get('check-user-answer/{id}',[TeacherController::class, 'check_answer'])->name('teacher.delet_user_answer');


    Route::get('check-user-answer/{id}/{checkid}',[TeacherController::class, 'check_correct_answer'])->name('teacher.check');
    Route::get('check-user-answer_notcorrect/{id}/{checkid}',[TeacherController::class, 'check_notcorrect_answer'])->name('teacher.check');


});

