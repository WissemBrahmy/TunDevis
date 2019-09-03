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
                        <strong>   Liste des offres</strong>


<div class="btn-group pull-right">

        <a class="btn btn-sm btn-success {{app('request')->input('confirmed')===1?'active':''}}" href="{{route("responses.index",["confirmed"=>1])}}">Acceptées</a>

        <a class="btn btn-sm btn-success {{app('request')->input('confirmed')===0?'active':''}}" href="{{route("responses.index",["confirmed"=>0])}}">En cours</a>

</div>


                    </div>
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-md-12">
                                <ul class="media-list">
                                    @foreach($posts as $post)
                                      <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{$post->photo_url}}" alt="..."
                                                         width="200" height="200">
                                                </a>
                                                <img  class="mr-1 img-circle" src="{{$post->user->avatar?$post->user->avatar:asset('logo/compte.png')}}" alt="..."
                                                      width="50" height="50" style="margin-left: 75px" >
                                                <h4 style="padding-left: 50px">{{$post->user->name}}</h4>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="thumbnail" style="background-image: url('{{asset('logo/pm.png')}}'); color: white">


                                              <span style="margin-left: 20px;text-transform: capitalize"> {{$post->title}} <br></span>
                                                </h3>

                                        <p >
                                                <h3 class="jumbotron">    {{$post->description}}
                                                    <br><br>
                                                    <span>
                                                  <img src="{{asset('logo/alarm.png')}}" cl>   {{$post->created_at->diffForHumans()}} </span>
                                                    <br>
                                                </h3>
                                        </p>
                                        <br><br>


                                        @if($post->user_id==Auth::user()->id)

                                            <a href="{{route('posts.edit',['id'=>$post->id])}}"
                                               class="btn btn-default btn-group-sm"><img src="../logo/mod.png"
                                                                                         width="15" height="15">Modifier</a>
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
                                            @else
                                                <ul class="media-list" style="background-color: #fafafa;padding: 15px">
                                                    @foreach($post->responses as $response)
                                                        <div class="panel panel-warning">
                                                            <div class="panel-heading" style="background-color: #f0ad4e">
                                                              <strong>  Votre offre </strong>
                                                            </div>
                                                            <div class="panel-body">
                                                                @include('responses.show')
                                                                <div style="display: none" id="edit-{{$response->id}}">
                                                                    @include("responses.edit")
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            <br>

                                    @endif
                                </div>

                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

        </div>
    </div>
    </div>
        </div>
    </div>
@endsection

