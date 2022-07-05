@extends('student.layouts.master_student')

@section('title', 'cavab')



@section('content')


<main class="container-fluid overflow-hidden pt-5 pb-5 position-relative">
    <section class="container rounded-3 d-flex flex-wrap pt-3 ps-4">
        <h1 class="w-100 text-light text-start fs-2">Programdan başqa fayl formatlarına eksport etmək</h1>
        <p class="w-100 text-start text-light mb-5">Təlimin cavablarını sistemə təqdim etmək üçün aşağıda hər sual üçün verilmiş müvafiq boşluqda onun cavabını yazmaq lazımdır. Bütün sualların cavablarını yazıb bitirdikdən sonra “Təqdim et” düyməsinə klik etməklə cavablarınızı sistemə yükləmiş
            olursunuz. Mentor sualları yoxlayıb qiymətləndirdikdən sonra isə artıq siz imtahan nəticələriniz ilə tanış ola bilərsiniz.</p>

        <h1 class="w-100 text-start text-light fs-5">Cavablar:
            @error('cavab*')<span class="text-danger">{{ $message }}</span>@enderror
            
        </h1>
        <form class="d-flex flex-wrap w-100" method="POST" action="{{ route('student.storeCavab', ['id'=>$telim->id]) }}">
            @csrf

            <?php $count = 0; $s_count=1;?>
            @for ($x = 0; $x < ceil($telim->sual_count / 10); $x++)
            <section class="d-flex flex-row flex-wrap pb-3" id="mainPanel">
                <?php $s_count=1; ?>
                @for ($a = 0; $a < $s_count; $a++)
                <section class="d-flex flex-column flex-wrap w-50 align-items-start" id="mainInFirstPanel">
                    @for ($c = 0; $c < 5; $c++)

                        @if ($count == $telim->sual_count)
                        <?php $s_count =0; ?>
                            @break
                        @endif
                        <?php $count +=1; ?>
                        <section class="w-100 d-flex flex-row flex-wrap mt-4 cinpt">
                            <section class="btn dgt text-center w-25 rounded-start fs-4 position-relative"><span class="position-absolute top-50">{{ $count }}</span></section>
                            <input class="w-50 ps-2 pt-3 pb-3 pe-2 border-0 rounded-end"  name='cavab[]' type="text">
                        </section>
                    @endfor

                </section>

                @if ($s_count == 2)
                    @break
                @endif
                <?php $s_count+=1;?>
                @endfor
            </section>

            @endfor

            <section class="position-relative">
                <input class="position-absolute border-0 nav-link dgt ps-4 pe-4 pb-2 pt-2 text-dark rounded-3" style="bottom: 3.5%; font-weight: 700 !important; font-size: 20px;" type="submit" value="Təqdim et!">


            </section>
        </form>
        <p class="w-100 text-start text-light fs-6">*Cavablar təqdim edildikdən sonra onları dəyişmək üzərində düzəlişlər etmək mümkün deyil!</p>
    </section>

@endsection
