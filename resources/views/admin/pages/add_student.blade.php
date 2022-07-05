@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'Telebe elave et')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Telebe formu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('admin.storestudent') }}">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="InputName">Ad </label>
                        <input type="text" class="form-control" id="InputName" name="name" placeholder="Ad daxil edin"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputName">Soy ad</label>
                        <input type="text" class="form-control" name="surname" id="InputName"
                            placeholder="Soy ad daxil edin" value="{{ old('surname') }}">
                        <span class="text-danger">@error('surname'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputEmail1">Elektron poct</label>
                        <input type="email" class="form-control" id="InputEmail1" name="email"
                            placeholder="Email daxil edin" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                    </div>



                    <div class="form-group">
                        <label for="InputPassword1">Şifrə</label>
                        <input type="password" class="form-control" id="InputPassword1" name="password"
                            placeholder="sifre daxil edin">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputPassword2">Təkrar şifrə</label>
                        <input type="password" class="form-control" id="InputPassword2" name="cpassword"
                            placeholder="təkrarsifre daxil edin">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>

                    </div>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Əlavə et</button>

                    @if ( Session::get('success'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success') }}
                    </span>
                    @endif
                    @if ( Session::get('error'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error') }}
                    </span>
                    @endif



                </div>
            </form>
        </div>
    </div>
</section>

@endsection
