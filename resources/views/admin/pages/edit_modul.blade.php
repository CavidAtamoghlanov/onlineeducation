@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'modul')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Modul Elave edin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.updateModul') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" value="{{ $modul->id }}" hidden name="id" id="">
                                <label for="InputModulname">Modul adi</label>
                                <input type="text" class="form-control" name="modulname" id="InputModulname"
                                    value="{{ $modul->name }}" placeholder="Modul daxil edin">
                                <span class="text-danger">@error('modulname'){{ $message }}@enderror</span>

                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">deis et</button>

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
            <!--/.col (left) -->
            <!-- right column -->



            <!--/.col (right) -->
        </div>
        <!-- general form elements -->

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection
