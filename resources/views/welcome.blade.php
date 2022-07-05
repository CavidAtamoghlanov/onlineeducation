@extends('layouts.master_home')

@section('title', 'Welcome')



@section('content')


<main class="container-fluid overflow-hidden pt-5">

    <section class="container d-flex flex-row flex-wrap mt-5 p-0">
        <h1 class="d-lg-inline-block">Bizə qoşulmağın əsl vaxtıdır!</h1>
        <section class="d-lg-inline-block d-flex align-items-center justify-content-center position-relative">
            <section class="position-absolute">
                <section class="position-relative w-100 h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('studentFront/img/image1.png')}}" alt="Temp Img">
                    <p class="position-absolute text-light">“ Hazırlanmış video dərslər və testlər ilə qısa zamanda işinizi öyrənin ”</p>
                </section>
            </section>
        </section>
    </section>

    <section class="container mt-5 p-0 position-relative">
        <h1 class="text-center">Təlimlər</h1>
        <div class="owl-carousel owl-theme w-100">
            @foreach ($telimler as $telim)
            <div class="item h-100">
                <div class="card d-lg-inline-block border-0 ms-2 me-2 pt-3 pb-2 ps-1 pe-1">
                    <div class=" border-0 ms-2 me-2 h-100">
                        <img src="{{ $telim->picture }}" class="card-img-top rounded-3" alt="Image 2">
                        <div class="card-body p-0 pt-3 pb-2 w-100 text-dark">
                            <h5 class="card-title">{{ $telim->submodul->modul->name }}/{{ $telim->name }}</h5>
                            <p class="card-text text-black-50">{{ $telim->short_desc }}</p>
                        </div>
                    </div>
                    <a data-bs-toggle="modal" data-bs-target="#signInModal" class="btn btn-primary w-100 pt-2 pb-2 border-0 text-dark" id="cardTransition">Dərslərə keçid</a>
                </div>
            </div>
            @endforeach


        </div>
    </section>
    <section class="container mt-5 mb-4 p-0 position-relative">
        <h1 class="text-center">Təlimçilər</h1>
        <div class="owl-carousel owl-theme w-100">
            @foreach ($telimciler as $telimci)
            <div class="item">
                <div class="card d-lg-inline-block border-0 ms-2 me-2 pt-3 pb-2 ps-1 pe-1">
                    <div class=" border-0 ms-2 me-2 h-100">
                        <img src="{{ $telimci->picture }}" class="card-img-top rounded-3" alt="Image 2">
                        <div class="card-body p-0 pt-3 pb-2 w-100 text-dark">
                            <h5 class="card-title">{{ $telimci->name }} {{ $telimci->surname }}</h5>
                            <p class="card-text text-black-50">{{ $telimci->position }}</p>
                        </div>
                    </div>
                    <a href="{{ route('selectMentor', ['id'=>$telimci->id]) }}" class="btn btn-primary w-100 pt-2 pb-2 border-0 text-dark" id="cardTransition">Ətraflı</a>
                </div>
            </div>

            @endforeach


        </div>
    </section>

</main>

@endsection
