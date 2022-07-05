@extends('student.layouts.master_student')

@section('title', 'telimci')



@section('content')

<main class="container-fluid overflow-hidden pt-2 pb-5">
    <section class="container d-flex flex-row flex-wrap w-100">
        <section class="d-flex flex-row flex-wrap w-100 mt-5" id="headerr">
            <img class="rounded-3" src="{{ $mentor->picture }}" alt="Ship 2">
            <section class="d-flex flex-column flex-wrap ms-2 pt-3">
                <h1 class="text-dark text-start fs-4 m-0 mb-1">{{ $mentor->name }} {{ $mentor->surname }}</h1>
                <p class="text-start cstactiveFront m-0 mb-1">{{ $mentor->subject }}</p>
                <p class="text-start cstactiveFront m-0">{{ $mentor->position }}</p>
            </section>
        </section>
        <h1 class="w-100 text-start mt-5 fs-2">Təlimçinin bütün videoları</h1>
        <section class="w-100" id="cardsPanel">




            @livewire('load-more', ['id' => $mentor->id])




        </section>

    </section>
    @endsection
