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
            <div class="col-md-6">

            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="{{asset('logo/off.png')}}" width="40" height="40">
                     <strong>   liste des offres</strong>
                    </div>
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-md-12">

                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="{{$post->photo_url}}" alt="..."
                                                 width="200" height="200">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="thumbnail " style="background-image: url('{{asset('logo/pm.png')}}'); color: white">{{$post->title}}</h4>

                                        <p>
                                           <strong> {{$post->description}}</strong>
                                        </p>
                                        <span class="pull-right">
                                              {{$post->created_at->diffForHumans()}}
                                          </span><br><br>
                                        @guest
                                            <a href="{{route('posts.edit',['id'=>$post->id])}}"
                                               class="btn btn-default btn-group-sm"><img src="../logo/mod.png"
                                                                                         width="15" height="15">Donner
                                                offre</a>

                                        @elseif($post->user_id==Auth::user()->id)

                                            <a href="{{route('posts.edit',['id'=>$post->id])}}"
                                               class="btn btn-default btn-group-sm"><img src="{{asset('logo/mod.png')}}"
                                                                                         width="15" height="15"> Modifier</a>
                                            <a href="#"
                                               onclick="document.getElementById('form-delete{{$post->id}}').submit()"

                                               class="btn btn-default btn-group-sm"><img src="../icon/delete.png"
                                                                                         width="15" height="15"></a>
                                            <form id="form-delete{{$post->id}}"
                                                  action="{{route('posts.destroy',['id'=>$post->id])}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <br>
                                            @if($post->responses)
                                                <ul class="media-list" style="background-color: #fafafa;padding: 15px">
                                                    @foreach($post->responses as $response)
                                                        @include('responses.show')
                                                    @endforeach
                                                </ul>

                                            @else
                                                 <p class=" alert alert-info">
                                                     Pas de offres
                                                 </p>
                                            @endif
                                            <br>

                                        @else
                                            @if($response=$post->responses()->where('user_id',Auth::user()->id)->first())
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        votre offre
                                                    </div>
                                                    <div class="panel-body">
                                                        @include('responses.show')
                                                        <div style="display: none" id="edit-{{$response->id}}">
                                                            @include("responses.edit")
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>



                                    @else
                                        <br>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                Donnez votre offre
                                            </div>
                                            <div class="panel-body">
                                                @include('responses.create')
                                            </div>
                                        </div>

                                    @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>

@endsection

