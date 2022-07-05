@extends('admin.layouts.master_admin')

@section('title', 'edit student')

@section('page_title', 'edit student')

@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
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
                                <form class="form-horizontal" method="POST" action="{{ route('admin.updateStudent') }}"
                                    id="TeacherInfoForm">
                                    @csrf
                                    <input type="text" value="{{ $student->id }}" hidden name="id" id="">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                value="{{ $student->name }}" name="name">
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Sur Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSurName"
                                                placeholder="Sur Name" value="{{ $student->surname }}" name="surname">
                                            <span class="text-danger">@error('surname'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                                value="{{ $student->email }}" name="email">
                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                                        </div>
                                    </div>





                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">edit Student</button>
                                            @if ( Session::get('success_info'))
                                            <span class="text-success text-lg ml-2">
                                                {{ Session::get('success_info') }}
                                            </span>
                                            @endif
                                            @if ( Session::get('error_info'))
                                            <span class="text-danger text-lg ml-2">
                                                {{ Session::get('error_info') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- personal info card change password --}}
                            <div class="tab-pane" id="change_password">
                                <form class="form-horizontal" action="{{ route('admin.updateStudentPassword') }}"
                                    method="POST">
                                    @csrf
                                    <input type="text" value="{{ $student->id }}" hidden name="id" id="">

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newpassword"
                                                name="newpassword" placeholder="new password">
                                            <span
                                                class="text-danger">@error('newpassword'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm new
                                            password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="cnewpassword"
                                                name="cnewpassword" placeholder="confirm new password">
                                            <span
                                                class="text-danger">@error('cnewpassword'){{ $message }}@enderror</span>

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
