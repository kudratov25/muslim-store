<x-main-layout>
    <style>
        .header-bottom {
            margin-bottom: 0;
        }
    </style>
    <x-slot:title>
        {{ __('Error 404. Page not found') }}
        </x-slot>
        <div class="content">
            <canvas class="snow" id="snow"></canvas>
            <div class="main-text">
                <h1> Ooops<br />'Hmm, looks like that page <br> doesn't exist.'</h1>
                <a class="home-link" href="{{ route('home')}}">Go Home</a>
            </div>
            <div class="ground">
                <div class="mound">
                    <div class="mound_text">404</div>
                    <div class="mound_spade"></div>
                </div>
            </div>
        </div>
</x-main-layout>
