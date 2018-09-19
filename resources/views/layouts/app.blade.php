<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Bootstrap core CSS -->
        {{Html::style('vendor/bootstrap/css/bootstrap.min.css')}}

        <!-- Custom styles for this template -->
        {{Html::style('css/blog-home.css')}}
        <!-- {{Html::style('css/app.css')}} -->

        <!-- Custom fonts for this template-->
        {{Html::style('vendor/fontawesome-free/css/all.min.css')}}

        <!-- Light Box Modal Images-->
        {{Html::style('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css')}}

        </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <h6 class="dropdown-header">Actions</h6>
                                        <div class="dropdown-divider"></div>
                                        @if(Auth::user()->admin ==1)
                                            <a class="dropdown-item" href="{{ url('/user') }}">
                                                <strong>
                                                    <i class="fa fa-user"></i> Admin
                                                </strong>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <strong>
                                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                            </strong>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <div class="container">

                <div class="row">

                    @yield('content')

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

            <!-- Footer -->
            <footer class="py-4 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
                </div>
                <!-- /.container -->
            </footer>
        
        </div>
        <!-- /.app -->

        <!-- Bootstrap core JavaScript -->
        {{Html::script('vendor/jquery/jquery.min.js')}}

        <!-- Custom Scripts -->
        {{Html::script('js/app.js')}}

        <!-- Core plugin JavaScript-->
        {{Html::script('vendor/jquery-easing/jquery.easing.min.js')}}
        
        <!-- JavaScript core ekko-lightbox -->
        {{Html::script('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js')}}

        <script type="text/javascript">
            $(function() {
                var offset = $("#sidebar").offset();
                var topPadding = 60;
                $(window).scroll(function() {
                    if ($(window).scrollTop() > offset.top) {
                        $("#sidebar").stop().animate({
                            marginTop: $(window).scrollTop() - offset.top + topPadding
                        });
                    } else {
                        $("#sidebar").stop().animate({
                            marginTop: 0
                        });
                    };
                });
            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        
        </script>
    </body>
</html>
