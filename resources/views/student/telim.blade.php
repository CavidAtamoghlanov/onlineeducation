@extends('student.layouts.master_student')

@section('title', 'profil')



@section('content')
@include('myAllFunctions.function')
<main class="container-fluid overflow-hidden pt-5 position-relative">
    <section class="container d-flex flex-wrap">
        <section class="d-flex flex-column flex-wrap" id="firstSection">
            <section class="accordion">
                {{-- menu start --}}
                @foreach ($moduls as $modul)
                <section class="rounded-3 p-0 mt-2 mb-0 w-100">
                    <section class="w-100">
                        <h5 class="mb-0 position-relative fs-5 p-0 mscs">
                            {{ $modul->name }}
                            <i class="fas fa-angle-down position-absolute top-0" data-bs-toggle="collapse"
                                data-bs-target="#out{{ $modul->id }}" onclick="call(this);"></i>

                        </h5>
                        <section id="out{{ $modul->id }}" class="collapse show w-100">
                            <section class="rounded-3 p-0 mt-2 mb-0">
                                @foreach ($submoduls as $submodul)
                                @if ($submodul->modul_id == $modul->id)
                                <section class="">
                                    <h5 class="mb-0 position-relative fs-5 p-0 text-black-50 summaryInSummary">
                                        {{ $submodul->name }}
                                        <i class="fas fa-angle-down position-absolute top-0" data-bs-toggle="collapse"
                                            data-bs-target="#In{{ $submodul->id }}" onclick="call(this);"></i>
                                    </h5>
                                    <section id="In{{ $submodul->id }}" class="collapse show cnt">

                                        @foreach ($telims as $telim)
                                        @if ($telim->submodul_id == $submodul->id)
                                        <a href="{{ url('student/telim/'.$telim->id) }}"
                                            style="text-decoration: none !important; color:black !important;">
                                            <p class="mt-2 mb-0 {{ (request()->is('student/telim/'.$telim->id)) ? 'cstactiveForCollapse' : '' }}">{{ $telim->name }}</p>
                                        </a>
                                        @endif

                                        @endforeach
                                    </section>
                                </section>
                                @endif
                                @endforeach
                            </section>

                        </section>
                    </section>
                </section>
                @endforeach

                {{-- menu end --}}

            </section>
        </section>

        <section class="d-flex flex-column flex-wrap">
            <h1 class="w-100 fs-3">{{ $selectTelim->short_desc }}</h1>
            <p class="w-100 fs-6 text-black-50">{{ timeAgo(\Carbon\Carbon::parse($selectTelim->updated_at)) }}</p>

            <embed class="w-100 border-0 rounded" src="{{ $selectTelim->video_link }}" type="video/mp4"
                title="Okaber Yalquzaq">

            <section class="d-flex flex-column flex-wrap w-100 mt-5">
                <section class="w-100 d-flex flex-row flex-wrap position-relative">
                    <p class="fs-6">Təlimin yazılı materialını buradan yüklə</p>
                    <center class="position-absolute">
                        <i class="fa fa-long-arrow-alt-right"></i>
                    </center>
                    <a href="{{ url('student/download',$selectTelim->id) }}"
                        class="p-1 ps-4 pe-4 position-absolute top-0 cstactive rounded-3 nav-link text-dark w-25 text-center trn">Təlimin
                        materialı</a>
                </section>
                @if ($selectTelim->imtahan_suallari)
                <section class="w-100 d-flex flex-row flex-wrap position-relative">
                    <p class="fs-6">Təlimin imtahan suallarını buradan yüklə</p>
                    <center class="position-absolute">
                        <i class="fa fa-long-arrow-alt-right"></i>
                    </center>
                    <a href="{{ url('student/download/question_file',$selectTelim->id) }}"
                        class="p-1 ps-4 pe-4 position-absolute top-0 cstactive rounded-3 nav-link text-dark w-25 text-center trn">İmtahan
                        sualları</a>
                </section>

                <section class="w-100 d-flex flex-row flex-wrap position-relative">
                    <p class="fs-6">Cavabların təqdimi</p>
                    <center class="position-absolute">
                        <i class="fa fa-long-arrow-alt-right"></i>
                    </center>
                    <a @if ($answer) @if(!$answer->teqdim_edilen_cavablar) href="{{ url('student/cavab-teqdimi/'.$selectTelim->id) }}"    @endif @endif
                        class="p-1 ps-4 pe-4 position-absolute top-0 cstactive rounded-3 nav-link text-dark w-25 text-center trn">Cavabların təqdim et</a>
                </section>
                @endif



            </section>

            <h1 class="w-100 text-start fs-2 text-dark mt-4">Təlimin məzmunu</h1>
            <p class="w-100 text-start text-black-50">{{ $selectTelim->desc }}</p>

            <h1 class="w-100 text-start fs-2 text-dark mt-4">Təlimçi</h1>
            <section class="d-flex flex-row flex-wrap w-100 mt-5 mb-5 position-relative" id="headerr">

                <img class="rounded-3" src="{{ $selectTelim->user->picture }}" style="width: 150px !important;" alt="Ship 2">
                <section class="d-flex flex-column flex-wrap ms-2 pt-3">
                    <h1 class="text-dark text-start fs-4 m-0 mb-1">{{ $selectTelim->user->name }} {{ $selectTelim->user->surname }}</h1>
                    <p class="text-start text-dark m-0 mb-1">{{ $selectTelim->user->subject }}</p>
                    <p class="text-start text-dark m-0">{{ $selectTelim->user->position }}</p>
                </section>
                <a class="position-absolute text-dark nav-link p-2 ps-3 pe-3 cstactive rounded-3"
                href="{{ url('student/mentors/'.$selectTelim->telimci_id) }}">Daha çox</a>
            </section>
        </section>


    </section>


    @endsection
