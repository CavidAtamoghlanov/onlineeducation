@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'telim')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Telim materiali elave edin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.updateTelim') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <input type="text" value="{{ $telim->id }}" hidden name="id" id="">

            <div class="form-group">
                <label for="InputTelimName">Telimin adi</label>
                <input type="text" class="form-control" name="name" value="{{ $telim->name }}"
                    id="InputTelimName" placeholder="Telim daxil edin">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="InputSortDesc">qisa melumat</label>
                <input type="text" class="form-control" value="{{ $telim->short_desc }}" id="InputSortDesc"
                    name="sortdesc" placeholder="Qisa melumat daxil edin">
                <span class="text-danger">@error('sortdesc'){{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="InputDesc">haqinda</label>
                <textarea rows="4" cols="165" name="InputDesc">


                {{ $telim->desc }}
            </textarea>
                <span class="text-danger">@error('InputDesc'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="">Sekil sec</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" name="selectimage" id="SelectImage">
                    <label class="custom-file-label" for="SelectImage">{{ $telim->picture }}</label>
                </div>
                <span class="text-danger">@error('selectimage'){{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="">material sec</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" name="selectmaterial" id="selectMaterial">
                    <label class="custom-file-label" for="selectMaterial">{{ $telim->material }}</label>
                </div>
                <span class="text-danger">@error('selectmaterial'){{ $message }}@enderror</span>

            </div>
            <div class="form-group">
                <label for="">suallar sec</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" name="selectSualFile"
                        id="selectQuestionMaterial">
                    <label class="custom-file-label" for="selectQuestionMaterial">{{ $telim->imtahan_suallari }}</label>
                </div>
                <span class="text-danger">@error('selectSualFile'){{ $message }}@enderror</span>

            </div>
            <div class="form-group">
                <label for="InputVideoLink">video melumat</label>
                <input type="text" class="form-control" id="InputVideoLink" value="{{ $telim->video_link }}"
                    name="vidolink" placeholder="Vido link daxil edin">
                <span class="text-danger">@error('vidolink'){{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="SelectSubModul">Sub modul secin</label>
                <select class="custom-select rounded-0" name="selectsubmodul" id="SelectSubModul">
                    @foreach ($submoduls as $submodul)
                    <option value="{{ $submodul->id }}" @if (($telim->submodul_id == $submodul->id)) selected   @endif>{{ $submodul->name }}</option>
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
</div>
<!-- general form elements -->

<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
@endsection
