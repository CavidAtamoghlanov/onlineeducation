<?php
use App\Models\Sosial_media;
use App\Models\Elaqe;
$elaqeler = Elaqe::all();
$social_medias = Sosial_media::all();
?>
<footer class="container-fluid pb-3">
    <div class="container d-flex flex-row flex-wrap pt-5 justify-content-start align-content-center">
        <div class="me-5 mb-4 text-light">
            <h4>Menu Başlıqları</h4>
            <ul class="d-flex flex-column flex-wrap list-unstyled mt-3">
                <li class="mt-2">
                    <a class="text-light text-center text-decoration-none" href="@if (Auth::user()) @if (Auth::user()->role == 'student')  {{ route('student.dashboard') }}  @endif   @else {{ route('welcome') }} @endif">Əsas</a>
                </li>
                <li class="mt-2">
                    <a class="text-light text-center text-decoration-none" href="@if (Auth::user()) @if (Auth::user()->role == 'student') {{ route('student.mentors') }}@endif  @else {{ route('mentors') }} @endif">Təlimçilər</a>
                </li>

                <li class="mt-2">
                    <a class="text-light text-center text-decoration-none" href="@if (Auth::user()) @if (Auth::user()->role == 'student') {{ route('student.about') }} @endif  @else {{ route('about') }} @endif">Haqqında</a>
                </li>
            </ul>
        </div>
        <div class="ms-5 me-5 mb-4 text-light">
            <h4>Bizi izləyin</h4>
            <ul class="d-flex flex-column flex-wrap list-unstyled mt-3">
                <li>
                    <a class="text-light text-center text-decoration-none">Bizim sosial media kanallarımız:</a>
                </li>
                <li class="mt-2 d-flex flex-row flex-wrap list-unstyled">
                    @foreach ($social_medias as $social_media)
                        <a class="me-4 text-decoration-none text-light" target="_blank" href="{{ $social_media->link }}" id="fFacebookTransition">{!! $social_media->icon !!}</a>
                    @endforeach


                </li>
            </ul>
        </div>
        <div class="ms-5 mb-4 text-light">
            <h4>Əlaqə:</h4>
            <ul class="d-flex flex-column flex-wrap list-unstyled mt-2">
                <li class="mt-2">
                    <a class="text-light text-center text-decoration-none">Sual və təklifləriniz üçün:</a>
                </li>
                <li class="mt-1">
                    @foreach ($elaqeler as $elaqe)
                        <a class="text-light text-center text-decoration-none" href="mailto:{{ $elaqe->email }}">

                            <p class="d-inline-block">{{ $elaqe->email }}</p>
                        </a>
                        <br>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <div class="container mt-5">
        <i class="fa fa-copyright text-light">&nbsp;<span>2022 All rights reserved</span></i>
    </div>
</footer>
