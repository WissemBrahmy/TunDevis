<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TUN-Devis.tn</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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
                    <a href="{{url('/')}}"  id="gh-la">
                        <img   style=' ' alt="" src="{{asset('logo/tundevis.png')}}" id="gh-logo" width="100" height="60">
                    </a><br>
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

                            <li class="btn-default"><a href="/"><img src="{{asset('logo/home.png')}}" class="icon-bar"><b> Accueil</b></a></li>
                           &nbsp <li class="btn-default"><a href="{{route("agreements")}}"><img src="{{asset('logo/reg.png')}}" class="icon-bar"><b> Règlements</b></a></li>
                            <li class="btn-default"><a href="{{route("about")}}"><img src="{{asset('logo/question.png')}}" class="icon-bar"><b> A propos</b></a></li>
                            <li class="btn-default"><a href="{{ route('login') }}"><img src="{{asset('logo/connexion.png')}}" class="icon-bar"><b> Connexion</b></a></li>
                            <li class="btn-default"><a href="{{ route('register') }}"><img src="{{asset('logo/ins.png')}}" class="icon-bar"><b> Inscription°</b></a></li>
                        @else
                            <li class="btn-default"><a href="/"><img src="{{asset('logo/home.png')}}" class="icon-bar"><b> Accueil</b></a></li>




                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <img src="{{asset('logo/icon.png')}}" class="icon-bar"><b> Demande Devis</b> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route("posts.index")}}"><img src="{{asset('logo/share.png')}}" class="icon-bar"><b> Mes Demandes</b></a>

                                    </li>
                                    <li>
                                        <a href="{{ route('responses.index') }}">
                                            <img src="{{asset('logo/list.png')}}" class="icon-bar">
                                            <b> Mes Offres </b>
                                        </a>


                                    </li>
                                    <li>
                                        <a href="{{ route('posts.create') }}">
                                            <img src="{{asset('logo/dev.png')}}" class="icon-bar">
                                            <b>     Demander devis </b>
                                        </a>


                                    </li>

                                </ul>
                            </li>
                              <li class="btn-default"><a href="{{route("agreements")}}"><img src="{{asset('logo/reg.png')}}" class="icon-bar"><b> Règlements</b></a></li>
                            <li class="btn-default"><a href="{{route("about")}}"><img src="{{asset('logo/question.png')}}" class="icon-bar"><b> A propos</b></a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <img src="{{Auth::user()->avatar?Auth::user()->avatar:asset('logo/compte.png')}}" width="25" height="25" class="img-circle">
                                 <b> {{ Auth::user()->name }}</b> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="dropdown">

                                        <a href="{{route("me")}}">
                                            <img src="{{asset('logo/set.png')}}"  class="icon-bar"><b> Mon profil</b></a>

                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <img src="{{asset('logo/lock.png')}}" class="icon-bar">
                                            <b>     Déconnexion </b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
       <div class="text-center">
            Copyright © 2019-TUN-Devis Inc. Tous les droits sont réservés. <a href="{{ route('terms_of_use') }}">
                Conditions d'utilisation</a>

    </div>
    </div>
    <!-- Scripts -->
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
<script>



    $(document).ready(function(){

        $('body').on('click','#btn-edit-response',function(){
         var id=$(this).data('id');
            $('#response-'+id).hide()
         $('#edit-'+id).show()



        })


        $('body').on('click','#modifier',function(){
            var id=$(this).data('id');

            $('#fields').toggle();



        })


    })
</script>


    <script type="text/javascript">
        $(document).ready(function(){
            $("#myCarousel").carousel();
        });
    </script>


</body>
</html>
