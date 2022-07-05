@extends('student.layouts.master_student')

@section('title', 'profil')



@section('content')


<main class="container-fluid overflow-hidden pt-3 position-relative position-relative">
    <!--Scroll Partition-->
    <section class="container overflow-hidden">
        <h1 class="w-100 text-start fs-4">Xoş gəldin {{ Auth::user()->name }}!</h1>
        <p class="w-100 text-start text-dark">Profilində aşağıda göstərilən davamlılıq xəttləri ilə hansı mövzuda daha
            güclü olduğunu görə və nisbətən zəif olduğun mövzularda təlimlərə yenidən qoşula və nəticələrini daha da
            yaxşılaşdıra bilərsən. </p>
        <section class="w-100" id="statisticsPanel">

            @foreach ($moduls as $modul)
            <section class="w-100 statisticsRow mt-4">
                <h1 class="w-100 text-start fs-2">{{ $modul->name }}</h1>
                <section class="w-100 d-flex flex-row flex-wrap c_prog">
                    <section class="w-75 progress rounded-3">
                        <section class="progress-bar text-end" role="progressbar"
                            style="width: {{ $answerArraytoarray[$modul->id]['dCVBfaiz'] }}%; background-color: #0257BF;"
                            aria-valuenow="{{ $answerArraytoarray[$modul->id]['dCVB'] }}" aria-valuemin="0"
                            aria-valuemax="{{ $answerArraytoarray[$modul->id]['sualCount'] }}" id="f1b1"></section>
                        <section class="progress-bar cstactive text-start text-dark" role="progressbar"
                            style="width: {{ $answerArraytoarray[$modul->id]['yCVBfaiz'] }}%;"
                            aria-valuenow="{{ $answerArraytoarray[$modul->id]['yCVB'] }}" aria-valuemin="0"
                            aria-valuemax="{{ $answerArraytoarray[$modul->id]['sualCount'] }}" id="f1b2">{{ $answerArraytoarray[$modul->id]['text_position'] }}
                        </section>
                    </section>
                    <a class="cstactive btn fs-6"  href="{{ route('student.telimler') }}">Təlimdə iştirak et</a>
                </section>
            </section>
            @endforeach

        </section>
    </section>

    <!--Carousel Body-->
    @if ($answersss->count() )
    <section class="container mt-5 mb-5 p-0 ps-3 position-relative">
        <h1 class="text-dark text-start w-100 fs-6">İştirak etdiyin təlimlər</h1>
        <div class="owl-carousel owl-theme w-100">
            @foreach ($answersss as $answer)

                    <div class="item h-100">
                        <div class="card d-lg-inline-block border-0 ms-2 me-2 pt-3 pb-2 ps-1 pe-1">
                            <div class=" border-0 ms-2 me-2 h-100">
                                <img src="{{ $answer->telim->picture }}" class="card-img-top rounded-3" alt="Ship">
                                <div class="card-body p-0 pt-3 pb-2 w-100 text-dark">
                                    <h5 class="card-title"><span>{{ Str::limit($answer->submodul->name, 29)  }}</span> <span class="text-muted"> / bal: {{ round($answerArraytoarray[$answer->modul->id]['dCVBfaiz'],2) }} </span></h5>
                                    <p class="card-text text-dark">Siz artıq bu təlimdə iştirak etmisiniz.</p>
                                </div>
                            </div>
                            <a href="{{ route('student.selecttelim', ['id'=>$answer->telim_id]) }}" class="btn btn-primary w-100 pt-2 pb-2 border-0 text-dark ct"
                                id="cardTransition">Təlimə kecin</a>
                        </div>
                    </div>

            @endforeach


        </div>
    </section>
    @endif


    <!--Private Part-->

    <input type="file" name="student_image" id="student_image"
    style="opacity: 0;height:1px;display:none">

    <section id="sectionBottomUserInfo" class="container mt-5 mb-4 p-0 overflow-hidden d-flex flex-row flex-wrap align-items-center">


        <img class="rounded-circle student_picture" src="{{ Auth::user()->picture }}" id="change_picture_btn" alt="My Photo">


        <section class="d-flex flex-column flex-wrap ms-3 position-relative mt-md-1">
            <input class="border-0 fs-5 w-100" type="text" id="firstname" readonly value="{{ Auth::user()->name  }}">
            <input class="border-0 fs-5 w-100" type="text" id="lastname" readonly value="{{ Auth::user()->surname }}">
            <i class="fa fa-pen position-absolute" data-bs-toggle="modal" data-bs-target="#signInModal"></i>
        </section>




        <section
            class="d-flex flex-row flex-wrap overflow-hidden ms-5 align-items-center justify-content-center align-content-center">
            <section class="w-75 text-start d-flex flex-column flex-wrap">
                <p class="text-dark fs-5 m-0 w-100">E-mail</p>
                <p class="text-dark fs-5 m-0 w-100 overflow-hidden">{{ Auth::user()->email }}</p>
            </section>

        </section>
        <section
            class="d-flex flex-row flex-wrap overflow-hidden ms-5 align-items-center justify-content-center align-content-center">
            <section class="w-75 text-start d-flex flex-column flex-wrap">
                <p class="text-dark fs-5 m-0 w-100">Şifrə</p>
                <p class="text-dark fs-5 m-0 w-100 overflow-hidden">*************</p>
            </section>
            <a data-bs-toggle="modal" data-bs-target="#resetPasswordModal" class="cstactive w-25 h-50 p-1 mt-2 fs-6 text-center nav-link rounded-3 hov"
                >Dəyiş</a>
        </section>
    </section>



    @endsection
