<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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



    {{-- footer style files --}}
    <link rel="stylesheet" href="{{ asset('studentFront/css/footerStyle.css') }}" />
    <!--Carousel style files-->
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.theme.default.min.css')}}" />

    @endif

    @if (Auth::user())
    @if (Auth::user()->role == 'student')
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{ asset('studentFront/css/loginedStyle.css')}}" />

    <link rel="stylesheet" href="{{ asset('studentFront/css/notificationStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/transitionsStyle.css')}}" />

    <!--Panels css files adding-->
    <!--Panels css files adding-->
    <link rel="stylesheet" href="{{ asset('studentFront/css/registerStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/loginStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/emailConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/passwordConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/resetPasswordStyle.css')}}">



    <link rel="stylesheet" href="{{ asset('studentFront/css/footerStyle.css')}}" />


    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/ijaboCropTool/ijaboCropTool.min.css') }}">




    @endif

    @endif


    @if (request()->is('student/dashboard*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mainStyle.css') }}" />

    @elseif (request()->is('student/mentors/*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mentorStyle.css')}}" />

    @elseif (request()->is('student/mentors*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/mentorsStyle.css')}}" />

    @elseif (request()->is('student/about*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/infoStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/resultStyle.css')}}" />
    @elseif (request()->is('student/telim*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/telimlerStyle.css')}}" />
    @elseif (request()->is('student/profil*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/profileStyle.css')}}" />

    @elseif (request()->is('student/cavab-teqdimi/*'))
    <link rel="stylesheet" href="{{ asset('studentFront/css/cavabTeqdim.css')}}" />
    <link rel="stylesheet" href="{{ asset('studentFront/css/cavabTeqdimPopUpStyle.css')}}" />
    @endif
    <!--Panels css files adding-->
    <link rel="stylesheet" href="{{ asset('studentFront/css/registerStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/loginStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/emailConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/passwordConfirmStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('studentFront/css/resetPasswordStyle.css')}}">

    <!--Icons address used CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="position-relative">
    @if (request()->is('student/cavab-teqdimi/*'))
        <!--Success Panel-->
        <section class="position-absolute w-100 h-100 pt-5 d-none popUpPanel" id="firstPanel">
            <section class="container mt-5">
                <section class="rounded d-flex flex-column flex-wrap">
                    <center class="w-100 mt-4 mb-3">
                        <section class="bg-light rounded-circle p-4">
                            <svg class="text-center w-100 h-100" width="82" height="82" viewBox="0 0 82 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M79.4062 28.3438L73.1562 22.25C71.75 20.6875 69.25 20.6875 67.8438 22.25L30.5 59.5938L13 42.25C11.5938 40.6875 9.25 40.6875 7.6875 42.25L1.59375 48.3438C0.03125 49.9062 0.03125 52.25 1.59375 53.6562L27.8438 79.9062C29.25 81.4688 31.5938 81.4688 33 79.9062L79.25 33.6562C80.8125 32.25 80.8125 29.9062 79.4062 28.3438ZM28.625 44.9062C29.5625 46 31.2812 46 32.2188 44.9062L64.7188 12.4062C65.6562 11.4688 65.6562 9.90625 64.7188 8.8125L57.6875 1.78125C56.5938 0.84375 55.0312 0.84375 54.0938 1.78125L30.5 25.5312L21.75 16.7812C20.8125 15.8438 19.25 15.8438 18.3125 16.7812L11.125 23.8125C10.1875 24.9062 10.1875 26.4688 11.125 27.4062L28.625 44.9062Z" fill="#276E6B"/>
                            </svg>
                        </section>
                    </center>
                    <center class="w-100 mb-4">
                        <h3 class="w-75 text-center fs-2">İmtahan nəticəniz uğurla təqdim edildi!</h3>
                    </center>
                    <center class="w-100 mb-3">
                        <a class="w-50 rounded-3 text-dark fs-6 btn-warning nav-link" href="{{ route('student.dashboard') }}">Əsas səhifəyə qayıt</a>
                    </center>
                </section>
            </section>
        </section>

        <!--Error Panel-->
        <section class="position-absolute w-100 h-100 pt-5 d-none popUpPanel" id="secondPanel">
            <section class="container mt-5">
                <section class="rounded d-flex flex-column flex-wrap">
                    <center class="w-100 mt-4 mb-3">
                        <section class="bg-light rounded-circle p-4">
                            <svg class="text-center w-100 h-100" width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M38.8125 28L54.4375 12.375C56.4688 10.5 56.4688 7.375 54.4375 5.5L51 2.0625C49.125 0.03125 46 0.03125 44.125 2.0625L28.5 17.6875L12.7188 2.0625C10.8438 0.03125 7.71875 0.03125 5.84375 2.0625L2.40625 5.5C0.375 7.375 0.375 10.5 2.40625 12.375L18.0312 28L2.40625 43.7812C0.375 45.6562 0.375 48.7812 2.40625 50.6562L5.84375 54.0938C7.71875 56.125 10.8438 56.125 12.7188 54.0938L28.5 38.4688L44.125 54.0938C46 56.125 49.125 56.125 51 54.0938L54.4375 50.6562C56.4688 48.7812 56.4688 45.6562 54.4375 43.7812L38.8125 28Z" fill="#C52222"/>
                            </svg>
                        </section>
                    </center>
                    <center class="w-100 mb-4">
                        <h3 class="w-75 text-center fs-2">Cavablarınız təqdim edilmədi yenidən cəhd edin!</h3>
                    </center>
                    <center class="w-100 mb-3">
                        <a class="w-50 rounded-3 text-dark fs-6 btn-warning nav-link" href="{{ route('student.telimler') }}">Yeni cəhd</a>
                    </center>
                </section>
            </section>
        </section>
    @endif
    @if (request()->is('student/profil*'))
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0 rounded">
                    <form class="d-flex flex-column flex-wrap" id="changePasswordUserForm" method="POST"
                        action="{{ route('student.UpdatePassword') }}">
                        <label class="text-light mb-2" for="oldpassword">Köhnə Şifrə</label>
                        <span class="text-danger error-text oldpassword_error"></span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="oldpassword"
                            id="oldpassword" placeholder="Şifrənizi daxil edin" />
                        <label class="text-light mb-2" for="newpassword">Yeni Şifrə</label>
                        <span class="text-danger error-text newpassword_error"></span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="newpassword"
                            id="newpassword" placeholder="Şifrənizi daxil edin" />

                        <label class="text-light mb-2" for="cnewpassword">Şifrənin təkrarı</label>
                        <span class="text-danger error-text cnewpassword_error"></span>
                        <input class="rounded border-0 p-3 me-5 mb-5" type="password" name="cnewpassword"
                            id="cnewpassword" placeholder="Şifrənizi yenidən daxil edin" />


                        <button class="rounded border-0 p-3 me-5 mb-4" type="submit" id="resetPassBtn">Şifrəmi
                            yenilə</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0 rounded">
                    <form class="w-100 d-flex flex-column flex-wrap" >
                        @csrf

                        <label class="text-light mb-2" for="inputName">Name</label>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="text" value="{{ Auth::user()->name }}"
                            placeholder="Name" name="name" id="inputName" value="{{ old('loginemail') }}">


                        <label class="text-light mb-2" for="inputSurName">Sur Name</label>

                        <span class="text-danger">@error('surname'){{ $message }}@enderror</span>

                        <input class="rounded border-0 p-3 me-5 mb-5" type="text" name="surname" id="inputSurName"
                            placeholder="Sur Name" value="{{ Auth::user()->surname }}">










                        <button type="submit" class="rounded border-0 p-3 me-5 mb-5
                    text-center nav-link" id="loginBtn">Daxil ol</button>
                        <p class="w-100 text-center mb-2" id="forgotLab" onclick="">Şifrəmi
                            unutmuşam</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!--Success Panel-->
    <section class="position-absolute w-100 h-100 pt-5 d-none popUpPanel" id="firstPanel">
        <section class="container mt-5">
            <section class="rounded d-flex flex-column flex-wrap">
                <center class="w-100 mt-4 mb-3">
                    <section class="bg-light rounded-circle p-4">
                        <svg class="text-center w-100 h-100" width="82" height="82" viewBox="0 0 82 82" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M79.4062 28.3438L73.1562 22.25C71.75 20.6875 69.25 20.6875 67.8438 22.25L30.5 59.5938L13 42.25C11.5938 40.6875 9.25 40.6875 7.6875 42.25L1.59375 48.3438C0.03125 49.9062 0.03125 52.25 1.59375 53.6562L27.8438 79.9062C29.25 81.4688 31.5938 81.4688 33 79.9062L79.25 33.6562C80.8125 32.25 80.8125 29.9062 79.4062 28.3438ZM28.625 44.9062C29.5625 46 31.2812 46 32.2188 44.9062L64.7188 12.4062C65.6562 11.4688 65.6562 9.90625 64.7188 8.8125L57.6875 1.78125C56.5938 0.84375 55.0312 0.84375 54.0938 1.78125L30.5 25.5312L21.75 16.7812C20.8125 15.8438 19.25 15.8438 18.3125 16.7812L11.125 23.8125C10.1875 24.9062 10.1875 26.4688 11.125 27.4062L28.625 44.9062Z"
                                fill="#276E6B" />
                        </svg>
                    </section>
                </center>
                <center class="w-100 mb-4">
                    <h3 class="w-75 text-center fs-2">İmtahan nəticəniz uğurla təqdim edildi!</h3>
                </center>
                <center class="w-100 mb-3">
                    <a class="w-50 rounded-3 text-dark fs-6 btn-warning nav-link" href="#">Əsas səhifəyə qayıt</a>
                </center>
            </section>
        </section>
    </section>

    <!--Error Panel-->
    <section class="position-absolute w-100 h-100 pt-5 d-none popUpPanel" id="secondPanel">
        <section class="container mt-5">
            <section class="rounded d-flex flex-column flex-wrap">
                <center class="w-100 mt-4 mb-3">
                    <section class="bg-light rounded-circle p-4">
                        <svg class="text-center w-100 h-100" width="57" height="57" viewBox="0 0 57 57" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M38.8125 28L54.4375 12.375C56.4688 10.5 56.4688 7.375 54.4375 5.5L51 2.0625C49.125 0.03125 46 0.03125 44.125 2.0625L28.5 17.6875L12.7188 2.0625C10.8438 0.03125 7.71875 0.03125 5.84375 2.0625L2.40625 5.5C0.375 7.375 0.375 10.5 2.40625 12.375L18.0312 28L2.40625 43.7812C0.375 45.6562 0.375 48.7812 2.40625 50.6562L5.84375 54.0938C7.71875 56.125 10.8438 56.125 12.7188 54.0938L28.5 38.4688L44.125 54.0938C46 56.125 49.125 56.125 51 54.0938L54.4375 50.6562C56.4688 48.7812 56.4688 45.6562 54.4375 43.7812L38.8125 28Z"
                                fill="#C52222" />
                        </svg>
                    </section>
                </center>
                <center class="w-100 mb-4">
                    <h3 class="w-75 text-center fs-2">Cavablarınız təqdim edilmədi yenidən cəhd edin!</h3>
                </center>
                <center class="w-100 mb-3">
                    <a class="w-50 rounded-3 text-dark fs-6 btn-warning nav-link" href="#">Yeni cəhd</a>
                </center>
            </section>
        </section>
    </section>





    <!--Header panel-->
    @include('student.layouts.header')

    <!--Main panel-->
    @yield('content')




    <!--Notification Panel-->
    <section class="position-absolute w-100 h-100 pt-5 d-none" id="notiPanel">
        <section class="container mt-5 position-relative">
            <form class="rounded d-flex flex-column flex-wrap position-absolute ps-2 pe-2">
                <div class="customeCard d-flex flex-row flex-wrap w-100 mt-3 mb-0 pb-0">
                    <div class="left">
                        <p class="text-start text-dark m-0 mb-2">Ms Word</p>
                        <p class="text-start text-dark text-black-50">Ms Word programında verdiyiniz imtahanın nəticəsi
                            elan edildi. Balınızı öyrənmək üçün keçid edin.</p>
                    </div>
                    <div class="right position-relative">
                        <a class="nav-link p-2 m-0 text-center position-absolute text-light rounded">Keçid</a>
                    </div>
                </div>
                <hr class="mt-0 p-0 w-100 mb-1" />
                <div class="customeCard d-flex flex-row flex-wrap w-100 mt-3">
                    <div class="left">
                        <p class="text-start text-dark m-0 mb-2">Ms Word</p>
                        <p class="text-start text-dark text-black-50">Ms Word programında verdiyiniz imtahanın nəticəsi
                            elan edildi. Balınızı öyrənmək üçün keçid edin.</p>
                    </div>
                    <div class="right position-relative">
                        <a class="nav-link p-2 m-0 text-center position-absolute text-light rounded">Keçid</a>
                    </div>
                </div>
                <hr class="mt-0 p-0 w-100 mb-1" />
                <div class="customeCard d-flex flex-row flex-wrap w-100 mt-3">
                    <div class="left">
                        <p class="text-start text-dark m-0 mb-2">Ms Word</p>
                        <p class="text-start text-dark text-black-50">Ms Word programında verdiyiniz imtahanın nəticəsi
                            elan edildi. Balınızı öyrənmək üçün keçid edin.</p>
                    </div>
                    <div class="right position-relative">
                        <a class="nav-link p-2 m-0 text-center position-absolute text-light rounded">Keçid</a>
                    </div>
                </div>
            </form>
        </section>
    </section>

    <!--Transition Panel-->
    <section class="position-absolute w-100 h-100 pt-5 d-none" id="transitionPanel">
        <section class="container mt-5 position-relative">
            <form class="rounded d-flex flex-column flex-wrap position-absolute p-2">
                <h1 class="text-center mt-2 mb-0 pb-2 border-bottom border-dark">Omer Haciyev</h1>
                <section class="d-flex flex-row flex-wrap border-bottom border-dark">
                    <h1 class="text-start text-dark mt-2 border-end border-dark">Təlimlər</h1>
                    <a href="{{ route('student.telimler') }}" class="text-center nav-link">Keçid</a>
                </section>
                <section class="d-flex flex-row flex-wrap border-bottom border-dark">
                    <h1 class="text-start text-dark mt-2 border-end border-dark">Profil</h1>
                    <a href="{{ route('student.profil') }}" class="text-center nav-link">Keçid</a>
                </section>
                <section class="d-flex flex-row flex-wrap border-bottom border-dark">
                    <h1 class="text-start text-dark mt-2 border-end border-dark">Təlimçilər</h1>
                    <a href="{{ route('student.mentors') }}" class="text-center nav-link">Keçid</a>
                </section>


                <a class="text-center nav-link btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Çıxış
                </a>


            </form>
        </section>
    </section>
    </main>
    <!--Footer panel-->
    @include('student.layouts.footer')

    <script src="{{ asset('studentFront/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('studentFront/js/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('studentFront/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('adminFront/plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    @if (request()->is('student/profil*'))
    <script>
        function textLocationChangeFunc(firstBar, secondBar) {
            var value = Number(secondBar.attr('aria-valuenow'));
            if (value < 10) {
                if (secondBar.text() != '') {
                    firstBar.text(secondBar.text());
                    secondBar.text('');

                    secondBar.css('padding-left', '0');
                    firstBar.css('padding-right', '1%');
                }
            } else {
                if (firstBar.text() != '') {
                    secondBar.text(firstBar.text());
                    firstBar.text('');

                    firstBar.css('padding-left', '0');
                    secondBar.css('padding-right', '1%');
                }
            }
        }
        $(document).ready(function () {
            setInterval(function () {
                textLocationChangeFunc($('#f1b1'), $('#f1b2'));
            }, 5);
            setInterval(function () {
                textLocationChangeFunc($('#f2b1'), $('#f2b2'));
            }, 5);
            setInterval(function () {
                textLocationChangeFunc($('#f3b1'), $('#f3b2'));
            }, 5);
            setInterval(function () {
                textLocationChangeFunc($('#f4b1'), $('#f4b2'));
            }, 5);

            $('#generet').click(function () {
                var v1 = $('#frt').val();
                var v2 = $('#scd').val();

                console.log(v1);
                console.log(v2);

                $('#f1b1').attr('aria-valuenow', v1);
                $('#f1b1').attr('style', `width: ${v1}%; background-color: #0257BF;`);

                $('#f1b2').attr('aria-valuenow', v2);
                $('#f1b2').attr('style', `width: ${v2}%;`);
            });
            $('.ct').click(function () {
                $('#resultPanel').removeClass('d-none');
                $(window).scrollTop(0);
            });
            $('#closingBtn').click(function () {
                $('#resultPanel').addClass('d-none');
            });
        });

    </script>
    @endif



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {



            //    change password
            $('#changePasswordUserForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function () {
                        $(document).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if (data.status == 0) {
                            $.each(data.error, function (prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $('#changePasswordUserForm')[0].reset();
                            alert(data.msg);
                        }
                    }
                });
            });


            $(document).on('click', '#change_picture_btn', function () {
                $('#student_image').click();
            });




            $('#student_image').ijaboCropTool({
                preview: '.student_picture',
                setRatio: 1,
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                buttonsText: ['CROP', 'QUIT'],
                buttonsColor: ['#30bf7d', '#ee5155', -15],
                processUrl: '{{ route("student.UpdateProfilImage") }}',
                //   withCSRF:['_token','{{ csrf_token() }}'],
                onSuccess: function (message, element, status) {
                    alert(message);
                },
                onError: function (message, element, status) {
                    alert(message);
                }
            });


        });




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


            $('#registerPanel').click(function () {
                $(this).addClass('d-none');
            });

            $('#loginPanel').click(function () {
                $(this).addClass('d-none');
            });
            $('#emailConfirmPanel').click(function () {
                $(this).addClass('d-none');
            });
            $('#passConfirmPanel').click(function () {
                $(this).addClass('d-none');
            });
            $('#resetPasswordPanel').click(function () {
                $(this).addClass('d-none');
            });

            $('#qdt').click(function () {
                $('#registerPanel').removeClass("d-none");
            });
            $('#dxl').click(function () {
                $('#loginPanel').removeClass("d-none");
            });
            $('#forgotLab').click(function () {
                $('#loginPanel').addClass('d-none');
                $('#emailConfirmPanel').removeClass('d-none');
            });
            $('#emailConfirmBtn').click(function () {
                $('#emailConfirmPanel').addClass('d-none');
                $('#passConfirmPanel').removeClass('d-none');
            });
            $('#confirmBtn').click(function () {
                $('#passConfirmPanel').addClass('d-none');
                $('#resetPasswordPanel').removeClass('d-none');
            });
            $('#resetPassBtn').click(function () {
                $('#resetPasswordPanel').addClass('d-none');
                $('#loginPanel').removeClass('d-none');
            });

            $('#emailConfirmBtn111').click(function () {
                $('#emailConfirmPanel').addClass('d-none');
                $('#passConfirmPanel').removeClass('d-none');
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
@if (request()->is('student/cavab-teqdimi/*'))
    @if ( Session::get('success'))
        <script>
            $('#firstPanel').removeClass("d-none");
        </script>
    @endif

    @if ( Session::get('error'))
        <script>
            $('#secondPanel').removeClass("d-none");
        </script>
    @endif
@endif

</body>

</html>
