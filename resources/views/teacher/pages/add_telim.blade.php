@extends('teacher.layouts.master_teacher')

@section('title', 'aboute')

@section('page_title', 'telim elave et')

@section('content')



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Modul Elave edin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('teacher.storemodul') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputModulname">Modul adi</label>
                                <input type="text" class="form-control" name="modulname" id="InputModulname"
                                    value="{{ old('modulname') }}" placeholder="Modul daxil edin">
                                <span class="text-danger">@error('modulname'){{ $message }}@enderror</span>

                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Elave et</button>

                            @if ( Session::get('success_modul'))
                            <span class="text-success text-lg ml-2">
                                {{ Session::get('success_modul') }}
                            </span>
                            @endif
                            @if ( Session::get('error_modul'))
                            <span class="text-danger text-lg ml-2">
                                {{ Session::get('error_modul') }}
                            </span>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- /.card -->



            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sub modul elave edin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('teacher.storesubmodul') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputSubModul">sub modul</label>
                                <input type="text" class="form-control" id="InputSubModul" name="submodulname"
                                    value="{{ old('submodulname') }}" placeholder="sub modul daxil edin">
                                <span class="text-danger">@error('submodulname'){{ $message }}@enderror</span>

                            </div>
                            <div class="form-group">
                                <label for="selectModul">Modul secin</label>
                                <select class="custom-select rounded-0" name="select_modul" id="selectModul">

                                    @foreach ($moduls as $modul)
                                    <option value="{{ $modul->id }}">{{ $modul->name }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger">@error('select_modul'){{ $message }}@enderror</span>

                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Elave et</button>
                            @if ( Session::get('success_submodul'))
                            <span class="text-success text-lg ml-2">
                                {{ Session::get('success_submodul') }}
                            </span>
                            @endif
                            @if ( Session::get('error_submodul'))
                            <span class="text-danger text-lg ml-2">
                                {{ Session::get('error_submodul') }}
                            </span>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>


            <!--/.col (right) -->
        </div>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Telim materiali elave edin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('teacher.storetelim') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="InputTelimName">Telimin adi</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            id="InputTelimName" placeholder="Telim daxil edin">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputSortDesc">qisa melumat</label>
                        <input type="text" class="form-control" value="{{ old('sortdesc') }}" id="InputSortDesc"
                            name="sortdesc" placeholder="Qisa melumat daxil edin">
                        <span class="text-danger">@error('sortdesc'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputDesc">haqinda</label>
                        <textarea rows="4" cols="165" name="InputDesc">


                        {{ old('InputDesc') }}
                    </textarea>
                        <span class="text-danger">@error('InputDesc'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Sekil sec</label>
                        <div class="custom-file">

                            <input type="file" class="custom-file-input" name="selectimage" id="SelectImage">
                            <label class="custom-file-label" for="SelectImage">Choose file</label>
                        </div>
                        <span class="text-danger">@error('selectimage'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="">material sec</label>
                        <div class="custom-file">

                            <input type="file" class="custom-file-input" name="selectmaterial" id="selectMaterial">
                            <label class="custom-file-label" for="selectMaterial">Choose file</label>
                        </div>
                        <span class="text-danger">@error('selectmaterial'){{ $message }}@enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="">suallar sec</label>
                        <div class="custom-file">

                            <input type="file" class="custom-file-input" name="selectSualFile"
                                id="selectQuestionMaterial">
                            <label class="custom-file-label" for="selectQuestionMaterial">Choose file</label>
                        </div>
                        <span class="text-danger">@error('selectSualFile'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="InputVideoLink">suallarin sayi</label>
                        <input type="text" class="form-control" id="InputsualCount" value="{{ old('questioncount') }}"
                            name="questioncount" placeholder="Vido link daxil edin">
                        <span class="text-danger">@error('questioncount'){{ $message }}@enderror</span>

                    </div>


                    <div class="form-group">
                        <label for="InputVideoLink">video melumat</label>
                        <input type="text" class="form-control" id="InputVideoLink" value="{{ old('vidolink') }}"
                            name="vidolink" placeholder="Vido link daxil edin">
                        <span class="text-danger">@error('vidolink'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="SelectSubModul">Sub modul secin</label>
                        <select class="custom-select rounded-0" name="selectsubmodul" id="SelectSubModul">
                            @foreach ($submoduls as $submodul)
                            <option value="{{ $submodul->id }}">{{ $submodul->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">@error('selectsubmodul'){{ $message }}@enderror</span>

                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Elave et</button>

                    @if ( Session::get('success_telim'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success_telim') }}
                    </span>
                    @endif
                    @if ( Session::get('error_telim'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error_telim') }}
                    </span>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
