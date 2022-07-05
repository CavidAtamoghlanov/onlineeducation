@extends('student.layouts.master_student')

@section('title', 'mentors')



@section('content')

<main class="container-fluid overflow-hidden pt-2 pb-5 position-relative">
    <section class="container d-flex flex-row flex-wrap w-100 justify-content-md-center">

        @foreach ($telimciler as $telimci)
             <div class="item h-100 mt-4 ms-4">
                 <div class="card d-lg-inline-block border-0 ms-2 me-2 pt-3 pb-2 ps-1 pe-1">
                     <div class=" border-0 ms-2 me-2 h-100">
                         <img src="{{ $telimci->picture}}" class="card-img-top rounded-3" alt="Ship">
                         <div class="card-body p-0 pt-3 pb-2 w-100 text-dark">
                             <h5 class="card-title fs-4">{{ $telimci->name }} {{ $telimci->surname }}</h5>
                             <p class="card-text text-black-50 ds">{{ $telimci->position }}</p>
                         </div>
                     </div>
                     <a href="{{ url('student/mentors/'.$telimci->id) }}" class="btn btn-primary w-100 pt-2 pb-2 border-0 text-dark" id="cardTransition">Ətraflı</a>
                 </div>
             </div>
        @endforeach

     </section>



@endsection
