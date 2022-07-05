@extends('student.layouts.master_student')

@section('title', 'aboute')



@section('content')


<main class="container-fluid overflow-hidden pt-3 position-relative">
    <section class="container mt-4">
        <h1 class="w-100 text-start fs-1">Haqqımızda</h1>
        <section class="w-100 d-flex flex-row flex-wrap mb-5">
            <p class="text-start text-dark w-50">
                @if ($about)
                {{ $about->description }}
                @endif
            </p>
            <section class="w-50 position-relative" id="imgBgPl">
                <section class="position-absolute top-0 rounded-3" id="imgBgPanel">
                    <section class="position-relative w-100 h-100">
                        <img class="position-absolute w-100 h-100 rounded-3" src="{{ asset('studentFront/img/image1.png') }}" alt="Iamge 1">
                        <p class="position-absolute ms-2 bottom-0 text-light"><span class="text-warning">“</span> Hazırlanmış video dərslər və testlər ilə qısa zamanda işinizi öyrənin <span class="text-warning">”</span></p>
                    </section>
                </section>
            </section>
        </section>
    </section>


@endsection
