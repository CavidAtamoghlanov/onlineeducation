@extends('teacher.layouts.master_teacher')

@section('title', 'aboute')

@section('page_title', 'Profil')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle admin_picture"
                                src="{{ Auth::user()->picture }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center admin_name">{{ Auth::user()->name }}</h3>
                        <h3 class="profile-username text-center admin_surname">{{ Auth::user()->surname }}</h3>

                        <p class="text-muted text-center">Admin</p>


                        <input type="file" name="admin_image" id="admin_image"
                            style="opacity: 0;height:1px;display:none">

                        <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn">Change
                            picture</a>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#personal_info"
                                    data-toggle="tab">Personal Information</a></li>
                            <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change
                                    password</a>
                            </li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            {{-- personal info card --}}
                            <div class="active tab-pane" id="personal_info">
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('teacher.UpdateProfilInfo') }}" id="AdminInfoForm">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                value="{{ Auth::user()->name }}" name="name">
                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Sur Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSurName"
                                                placeholder="Sur Name" value="{{ Auth::user()->surname }}"
                                                name="surname">
                                            <span class="text-danger error-text surname_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                                value="{{ Auth::user()->email }}" name="email">
                                            <span class="text-danger error-text email_error"></span>

                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Save Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- personal info card change password --}}
                            <div class="tab-pane" id="change_password">
                                <form class="form-horizontal" action="{{ route('teacher.UpdatePassword') }}" method="POST"
                                    id="changePasswordAdminForm">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="oldpassword"
                                                name="oldpassword" placeholder="Old password">
                                            <span class="text-danger error-text oldpassword_error"></span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newpassword"
                                                name="newpassword" placeholder="new password">
                                            <span class="text-danger error-text newpassword_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm new
                                            password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="cnewpassword"
                                                name="cnewpassword" placeholder="confirm new password">
                                            <span class="text-danger error-text cnewpassword_error"></span>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection
