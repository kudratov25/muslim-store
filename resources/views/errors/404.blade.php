<x-main-layout>
    <style>
        .header-bottom {
            margin-bottom: 0;
        }
    </style>
    <x-slot:title>
        {{ __('Error 404. Page not found') }}
        </x-slot>
        <x-nav-status>
            404 Error
        </x-nav-status>
        {{-- <div class="content">
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
        </div> --}}
        <!-- Error 404 Area Start -->
        <div class="error404-area pt-30 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-wrapper text-center ptb-50 pt-xs-20">
                            <div class="error-text">
                                <h1>404</h1>
                                <h2>Opps! PAGE NOT FOUND</h2>
                                <p>Sorry but the page you are looking for does not exist, have been removed, <br> name
                                    changed or is temporarity unavailable.</p>
                            </div>
                            <div class="search-error">
                                <form id="search-form" action="#">
                                    <input type="text" placeholder="Search">
                                    <button><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </div>
                            <div class="error-button">
                                <a href="{{route('home')}}">Back to home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error 404 Area End -->
</x-main-layout>
