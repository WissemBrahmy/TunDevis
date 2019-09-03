@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session('message'))
                    <p class="alert alert-info">
                        {{session('message')}}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-12">
                <div class="panel panel-default" style="background-image: url('{{asset('logo/ttt.png')}}')">

                        <img src="{{asset('logo/pm.png')}}" width="1138" height="80">

                        <div class="pull-right">
                            <div >
                        <h4><img src="{{Auth::user()->avatar?Auth::user()->avatar:asset('logo/compte.png')}}" width="100" height="100" class="img-circle">
                            &nbsp;{{Auth::user()->name}}</h4>
                            <form action="{{route('updateAvatar')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="file" name="avatar" class="hidden-print" >

                                <button class="btn btn-xs " type="submit"><img src="{{asset('logo/mod.png')}}" width="10" height="10"> Modifier ma photo</button>
                            </form>
                            </div>
                               </div>

                    <div class="panel-body">
                        <div class="media">
                            <div class="media-right">
                                  </div>
                            <div class="media-body">



                            </div>


                                <h4>Email: &nbsp;{{Auth::user()->email}}</h4>
                                <h4> Téléphone: &nbsp;{{Auth::user()->phone}}</h4>
                                <h4>Addresse: &nbsp;{{Auth::user()->address}}</h4>
                                <h4>Ville: &nbsp;{{Auth::user()->ville}}</h4>
                            </div>
                    <div type="hidden"   value="{{$u=Auth::user()->id}}">
                        <a href="{{route('editInfo',['id'=>$u])}}" class="btn btn-default btn-group-sm"><img src="{{asset('logo/mod.png')}}" class="icon-bar"><b> Actualiser mes informations</b></a>
<br><br>
                        <div class="password">
                            <button id="modifier" class="btn btn-default btn-group-sm"> <img src="{{asset('logo/mod.png')}}" class="icon-bar"><b> Modifier  Mot de passe</b></button>
                        </div>

                            <form action="{{route('updatepassword')}}" method="POST">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <section class="form-group">

                        <div class="fields" id="fields" style="display: {{count($errors)?'block':'none'}}">
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" placeholder="Votre ancien mot de passe" name="password" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">

                             <input type="password" placeholder="Votre nouveau mot de passe" name="new_password" class="form-control">
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                              <input type="password" placeholder="Retapez votre nouveau mot de passe" name="new_password_confirmation" class="form-control">
                                @if ($errors->has('new_password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <button  class="btn btn-default btn-group-sm"> <img src="{{asset('logo/checked.png')}}" class="icon-bar"><b> Enregistrer</b></button>

                            </div>

                        </div>
                        </section>
                            </form>

                    </div>


                        <div style="margin-left: 300px" >

                                    <a href="{{route("posts.index")}}" class="btn btn-default btn-group-sm"><img src="{{asset('logo/share.png')}}" class="icon-bar"><b> Gérer Mes Demandes</b></a>

                                    <a href="{{ route('responses.index') }}" class="btn btn-default btn-group-sm">
                                        <img src="{{asset('logo/list.png')}}" class="icon-bar"><b> Gérer mes offres </b></a>

                                    <a href="{{ route('posts.create') }}" class="btn btn-default btn-group-sm"><img src="{{asset('logo/dev.png')}}" class="icon-bar"><b> Demander un devis </b></a>


                        </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

