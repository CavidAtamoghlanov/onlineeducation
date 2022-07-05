@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'submodul')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sub modul elave edin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.updateSubModul') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <input type="text" value="{{ $submodul->id }}" hidden name="id" id="">

                    <label for="InputSubModul">sub modul</label>
                    <input type="text" class="form-control" id="InputSubModul" name="submodulname"
                        value="{{ $submodul->name }}" placeholder="sub modul daxil edin">
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
        </form>
    </div>
    <!-- /.card -->
</div>
</div>
<!-- general form elements -->

<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
@endsection
