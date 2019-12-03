<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('js/sweetalert.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           >
                                            Logout
                                        </a>

                                       
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
   <!-- delete with ajax for all project -->
        <div id="delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
            </div>
        </div>
        <script id="template-modal" type="text/html" >
            <div class = "modal-content" >
                <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                <div class = "modal-header" >
                    <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                    <h4 class = "modal-title bold" > Delete Element ?</h4>
                </div>
                <div class = "modal-body" >
                    <p > Are You Sure ?</p>
                </div>
                <div class = "modal-footer" >
                    <a
                        href = "{url}"
                        id = "delete" class = "btn btn-danger" >
                       Delete
                    </a>

                    <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                       Cancel </button >
                </div>
            </div>
        </script>
        <form action="#" id="csrf">{!! csrf_field() !!}</form>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
       <!--<script src="{{asset('assets/admin/ajax.js')}}"></script> -->
    <script src="{{asset('js/global.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
</body>
</html>
