<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a id="logo" class="navbar-brand" href="@if (Auth::user()) @if (Auth::user()->role == 'student')  {{ route('student.dashboard') }}  @endif   @else {{ route('welcome') }} @endif">
            <img id="logoImg" src="{{ asset('studentFront/img/logo.png')}}" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav w-100 justify-content-center" id="navbarItems">
                <li class="nav-item me-lg-3">
                    <a class="nav-link text-primary text-center {{ (request()->is('/*')) ? 'active' : '' }}" aria-current="page" href="@if (Auth::user()) @if (Auth::user()->role == 'student')  {{ route('student.dashboard') }}  @endif   @else {{ route('welcome') }} @endif">Әsas</a>
                </li>
                <li class="nav-item me-lg-3">
                    <a class="nav-link text-primary text-center {{ (request()->is('mentors*')) ? 'active' : '' }}" href="@if (Auth::user()) @if (Auth::user()->role == 'student') {{ route('student.mentors') }}@endif  @else {{ route('mentors') }} @endif">Təlimçilər</a>
                </li>
                <li class="nav-item me-lg-3">
                    <a class="nav-link text-primary text-center {{ (request()->is('about*')) ? 'active' : '' }}" href="@if (Auth::user()) @if (Auth::user()->role == 'student') {{ route('student.about') }} @endif  @else {{ route('about') }} @endif">Haqqında</a>
                </li>

            </ul>


                @if(Auth::user())
                    @if (Auth::user()->role == 'student')
                    <div class="rounded btn w-auto text-nowrap mt-lg-0 mt-md-3 nav-link"  id="userProfileBtnPanel">
                        <img id="userProfileBtImg" class="rounded-circle border-0 d-lg-inline-block me-2" src="{{ asset('studentFront/img/myPhoto.jpg')}}" />
                        <a class="d-lg-inline-block text-decoration-none text-dark" id="userProfileBtUsername">{{ Auth::user()->name  }} {{ Auth::user()->surname }}</a>
                        <i class="fa fa-bell ms-2 text-dark" id="notIcon"></i>

                        <!-- <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="notIcon">
                            <path d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"/>
                        </svg> -->
                    </div>
                    @endif

                @elseif(!Auth::user())
                    <div class="d-flex flex-row flex-wrap mt-lg-0 mt-md-3"  id="userProfileBtnPanel">
                        <button class="btn nav-link text-light" id="qdt" data-bs-toggle="modal" data-bs-target="#registerModal">Qeydiyyat</button>
                        <button class="btn nav-link text-dark" id="dxl" data-bs-toggle="modal" data-bs-target="#signInModal">Daxil ol!</button>
                    </div>


                @endif




        </div>
    </div>
</nav>
