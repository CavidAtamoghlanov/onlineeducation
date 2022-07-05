<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('studentFront/img/Fav Icon.png') }}" type="image/icon type">

    <!--Used fonts address CDN-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">

    @if (!Auth::user())
    <!--Add css files -->
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('studentFront/css/nbregisterOrSigninStyle.css') }}" />






    <!--Panels css files adding-->
    <link rel="stylesheet" href="{{ asset('studentFront/css/registerStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/loginStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/emailConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/passwordConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/resetPasswordStyle.css')}}">


    {{-- footer style files --}}
    <link rel="stylesheet" href="{{ asset('studentFront/css/footerStyle.css') }}" />
    <!--Carousel style files-->
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.theme.default.min.css')}}" />

    @endif

    @if (request()->is('/*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mainStyle.css') }}" />
    @elseif (request()->is('login*') || request()->is('register*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mainStyle.css') }}" />

    @elseif (request()->is('mentors*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mentorsStyle.css')}}" />
    @elseif (request()->is('mentor/*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mentorStyle.css')}}" />

    @elseif (request()->is('about*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/infoStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/resultStyle.css')}}" />
    @elseif (request()->is('telim*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/telimlerStyle.css')}}" />
    @endif



    @if (Auth::user())
    @if (Auth::user()->role == 'student')
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{ asset('studentFront/css/loginedStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/mainStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/notificationStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/transitionsStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/footerStyle.css')}}" />


    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.theme.default.min.css')}}" />
    @endif

    @endif

    <!--Icons address used CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="position-relative">
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0 rounded">
                    <form class="d-flex flex-column flex-wrap" method="POST" action="{{ route('register') }}">
                        @csrf
                        <label class="text-light mb-2" for="ad">Ad</label>
                        <span class="text-danger">@error('regname'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="text" name="regname" id="ad"
                            placeholder="Adınızı qeyd edin" value="{{ old('regname') }}" />



                        <label class="text-light mb-2" for="soyad">Soyad</label>
                        <span class="text-danger">@error('regsurname'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="text" name="regsurname" id="soyad"
                            placeholder="Soyadınızı qeyd edin" value="{{ old('regsurname') }}" />


                        <label class="text-light mb-2" for="email">E-mail</label>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="mail" name="email" id="email"
                            placeholder="Elektron poçt qeyd edin" value="{{ old('email') }}" />


                        <label class="text-light mb-2" for="pass">Şifrə</label>
                        <span class="text-danger">@error('regpassword'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="regpassword" id="pass"
                            placeholder="Şifrə təyin edin" />


                        <label class="text-light mb-2" for="passConfirm">Şifrə təsdiqi</label>
                        <span class="text-danger">@error('regcpassword'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="regcpassword"
                            id="passConfirm" placeholder="Şifrəni yenidən daxil edin" />


                        <div class="w-100 d-flex-flex-row flex-wrap mb-2">
                            <span class="text-danger">@error('reginlineRadioOptions'){{ $message }}@enderror</span>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reginlineRadioOptions"
                                    id="inlineRadio1" checked="checked" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Tələbə</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reginlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Müəllim</label>
                            </div>
                        </div>

                        @if ( Session::get('success_register'))
                        <span class="text-danger text-center text-lg ml-2">
                            {{ Session::get('success_register') }}
                        </span>
                        @endif

                        @if ( Session::get('error_register'))
                        <span class="text-danger text-center text-lg ml-2">
                            {{ Session::get('error_register') }}
                        </span>
                        @endif
                        <button type="submit" class="rounded border-0 p-3 me-5 mb-5 text-center nav-link"
                            id="createAccountBtn">Hesab yarat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0 rounded">
                    <form class="w-100 d-flex flex-column flex-wrap" method="POST" action="{{ route('login') }}">
                        @csrf
                        <label class="text-light mb-2" for="email">E-mail</label>
                        <span class="text-danger">@error('loginemail'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="email" name="loginemail" id="email"
                            placeholder="Elektron poçt qeyd edin" value="{{ old('loginemail') }}">
                        <label class="text-light mb-2" for="pass">Şifrə</label>

                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="password" id="pass"
                            placeholder="Şifrə təyin edin">




                        @if ( Session::get('error_login'))
                        <span class="text-danger text-center text-lg ml-2">
                            {{ Session::get('error_login') }}
                        </span>
                        @endif
                        <button type="submit" class="rounded border-0 p-3 me-5 mb-5
                    text-center nav-link" id="loginBtn">Daxil ol</button>
                        <p class="w-100 text-center mb-2" id="forgotLab" onclick="">Şifrəmi
                            unutmuşam</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailConfirmModal" tabindex="-1" aria-labelledby="emailConfirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0 rounded">
                    <form class="d-flex flex-column flex-wrap">
                        <label class="text-light mb-2" for="email">E-mail</label>
                        <input class="rounded border-0 p-3 me-5 mb-5" type="email" name="email" id="email"
                            placeholder="Elektron poçt qeyd edin" />

                        <input class="rounded border-0 p-3 me-5 mb-4" type="button" id="emailConfirmBtn"
                            value="E-mail-ə təsdiq göndərmək" />
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Header panel-->
    @include('layouts.header')

    <!--Main panel-->
    @yield('content')





    <!--Footer panel-->
    @include('layouts.footer')

    <script src="{{ asset('studentFront/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('studentFront/js/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('studentFront/js/owl.carousel.min.js')}}"></script>
    <script>
    var signInModal = new bootstrap.Modal(document.getElementById("signInModal")); // get modal
    var emailConfirmModal = new bootstrap.Modal(document.getElementById("emailConfirmModal"));


        var openedNotificationPanel = false;
        var openedTransitionPanel = false;
        $(document).ready(function () {




            $('#notIcon').click(function () {
                if (!openedNotificationPanel) {
                    openedNotificationPanel = true;
                    $('#notiPanel').removeClass('d-none');

                    $(this).removeClass('text-dark');
                    $(this).addClass('text-light');

                    if (openedTransitionPanel) {
                        $('#transitionPanel').addClass('d-none');
                        $('#userProfileBtUsername').addClass('text-dark');
                        openedTransitionPanel = false;
                    }
                } else if (openedNotificationPanel) {
                    openedNotificationPanel = false;
                    $('#notiPanel').addClass('d-none');

                    $(this).addClass('text-dark');
                    $(this).removeClass('text-light');
                }
            });
            $('#userProfileBtUsername').click(function () {
                if (!openedTransitionPanel) {
                    openedTransitionPanel = true;
                    $('#transitionPanel').removeClass('d-none');

                    $(this).removeClass('text-dark');
                    $(this).addClass('text-light');

                    if (openedNotificationPanel) {
                        $('#notiPanel').addClass('d-none');
                        $('#notIcon').addClass('text-dark');
                        openedNotificationPanel = false;
                    }
                } else if (openedTransitionPanel) {
                    openedTransitionPanel = false;
                    $('#transitionPanel').addClass('d-none');

                    $(this).addClass('text-dark');
                    $(this).removeClass('text-light');
                }
            });


                $("#forgotLab").click(function () {
                    signInModal.hide();
                    emailConfirmModal.show();
                });






        });


        $('.owl-carousel').owlCarousel({
            dots: false,
            // autoplay: true,
            // autoplayTimeout: 4000,
            // autoplaySpeed: 1500,
            autoplayHoverPause: true,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

    </script>

    @if($errors->has('regname') || $errors->has('regsurname')|| $errors->has('email') || $errors->has('regpassword') ||
    $errors->has('reginlineRadioOptions') || Session::get('error_register') || Session::get('success_register'))
    <script>
        $('#qdt').click();

    </script>
    @endif


    @if($errors->has('loginemail') || $errors->has('password') || Session::get('error_login'))
    <script>
        $('#dxl').click();

    </script>
    @endif

    <script>
        function call(element) {
            var className = element.className;
            var classNameSplited = className.split(' ');
            if (classNameSplited[1] == "fa-angle-down")
                classNameSplited[1] = "fa-angle-up";
            else if (classNameSplited[1] == "fa-angle-up")
                classNameSplited[1] = "fa-angle-down";

            element.className = "";
            for (let i = 0; i < classNameSplited.length; i++) {
                if (classNameSplited[i] != "") {
                    element.className += classNameSplited[i] + " ";
                }
            }
        }

        $(document).ready(function () {
            $('.collapse').collapse();
        });

    </script>
</body>

</html>
