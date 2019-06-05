<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link  rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="favorite">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('favorite.name', 'News Feed') }}
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
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/favorites/{{ Auth::user()->id}}"> Favorites Articles </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

        @if($favorites != '[]')
        <!--        Case where you have at least one favorite news-->
        <div  class="container-fluid">
        @foreach($favorites as $favorite)

            <div class="card mb-2 border-dark" >

                <div class="row no-gutters d-flex ">
<!--                    Image-->
                    <div class="col-md-4 ">
                        <img src="{{$favorite->urlToImage}}" alt="{{$favorite->title}}" class="card-img">
                    </div>

<!--                    Text-->
                    <div class="col-md-8 ">

                        <div class="card-body "
                             style="height: 222px">
                            <h5 class="card-title pb-4 "> <a href="{{$favorite->url}}">{{$favorite->title}}</a></h5>
                            <p class="card-text pb-4">{{$favorite->description}}</p>
                            @if($favorite->author != null)
                            <p class="card-text" > Written by {{$favorite->author}}</p>
                            @endif
                        </div>

<!--                        Delete Button-->
                        <div class="card-footer bg-white text-center ">
                            <form method="post" action="{{ route('Favorites.destroy',['id' => $favorite->id]) }}">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" value="{{$favorite->user_id}}" name="user_id"/>
                                <input type="hidden" value="{{$favorite->title}}" name="title"/>
                                <input type="hidden" value="{{$favorite->description}}" name="description"/>
                                <input type="hidden" value="{{$favorite->author}}" name="author"/>
                                <input type="hidden" value="{{$favorite->urlToImage}}" name="urlToImage"/>
                                <input type="hidden" value="{{$favorite->url}}" name="url"/>

                                <button type="submit" class="btn btn-info"><i class="far fa-star "></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

<!--        Pagination links-->
        {{ $favorites->links() }}


        @else
        <!--        Case where you don't have any favorite news-->

        <div class="container-fluid">
            <h2>Sorry but you did not registered any favorite.</h2>
        </div>
        @endif
    </div>
</body>
</html>

