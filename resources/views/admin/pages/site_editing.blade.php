@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'Sayt melumatlarini deismek')


@section('content')


<section class="content">
    <div class="container-fluid">
        {{-- update aboud hisses --}}
        <div class="card card-outline card-info">
            @if ($about)
            <form action="{{ url('admin/changeabout/'.$about->id) }}" method="POST">
                @csrf

                <div class="card-header">
                    <h3 class="card-title">
                        Haqqimizda formu
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <textarea rows="15" cols="165" name="description">
                        {{  $about->description  }}
                      </textarea>
                </div>
                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Yenilə</button>

                    @if ( Session::get('success_desc'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success_desc') }}
                    </span>
                    @endif
                    @if ( Session::get('error_desc'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error_desc') }}
                    </span>
                    @endif


                </div>


            </form>
            @endif

        </div>

        {{-- update sosial media  link --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sosial media formu</h3>
            </div>




            <div class="card-body">
                @if ($sosial_medias->count())
                    @foreach ($sosial_medias as $sosial_media)


                    <form action="{{ url('admin/changesocialmedia/'.$sosial_media->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ $sosial_media->name }}</label>
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" name="social_media"
                                    value="{{ $sosial_media->link }}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-flat">Yenilə</button>
                                </span>

                            </div>
                        </div>
                    </form>
                    @endforeach
                @endif


            </div>
            <div class="card-footer">
                @if ( Session::get('success_social'))
                <span class="text-success text-lg ml-2">
                    {{ Session::get('success_social') }}
                </span>
                @endif
                @if ( Session::get('error_social'))
                <span class="text-danger text-lg ml-2">
                    {{ Session::get('error_social') }}
                </span>
                @endif
            </div>


        </div>



        {{-- update elaqe melumat  link --}}
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Elaqe formu</h3>
            </div>




            <div class="card-body">
                @if ($elaqeler->count())
                    @foreach ($elaqeler as $elaqe)


                    <form action="{{ url('admin/changeelaqe/'.$elaqe->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ $elaqe->name }}</label>
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" name="elaqe"
                                    value="{{ $elaqe->email }}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-warning btn-flat">Yenilə</button>
                                </span>

                            </div>
                        </div>
                    </form>
                    @endforeach

                @endif


            </div>
            <div class="card-footer">
                @if ( Session::get('success_elaqe'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success_elaqe') }}
                    </span>
                @endif
                @if ( Session::get('error_elaqe'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error_elaqe') }}
                    </span>
                @endif
            </div>


        </div>



    </div>
    </div>
</section>

@endsection
