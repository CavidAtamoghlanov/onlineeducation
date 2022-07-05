@forelse ($telimler as $telim)
<section class="w-100 card d-flex flex-row flex-wrap p-3 rounded-3 mt-4">
    <section>
        <img class="rounded-3 w-100 h-100" src="{{ $telim->picture }}" alt="Ship 3">
    </section>
    <section class="d-flex flex-column flex-wrap ms-3 position-relative">
        <h1 class="text-start text-light fs-4">{{ $telim->name }}</h1>
        <p class="text-start fs-6">{{ $telim->desc }}</p>
        <section class="w-100 d-flex flex-column flex-wrap align-items-end h-25 tt position-absolute bottom-0">
            <a class="btn cstactive nav-link text-dark text-center rounded pt-2 pb-2 fs-6"
                @auth
                href="{{ url('student/telim/'.$telim->id) }}"
                @endauth  @if (!Auth::user())
                data-bs-toggle="modal" data-bs-target="#signInModal"
                @endif>Təlimə keçid</a>
        </section>
    </section>
</section>
@empty
<h2>Təlimçiyə aid heçbir aktiv təlim tapımadı!</h2>
@endforelse


{{-- <section class="d-flex flex-column flex-wrap w-100 mt-3 align-items-end" id="load_more_button">
    <button wire:click="more()" class="btn cstactive nav-link text-center text-dark rounded-3 fs-6">Daha çox təlim yüklə</button>
</section> --}}
