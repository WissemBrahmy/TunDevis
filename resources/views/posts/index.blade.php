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
                    <div class="panel-heading" >
                        <img src="{{asset('logo/dd.png')}}" width="40" height="40">
                      <strong>  Ma liste des demandes</strong>

                    </div>

                    <div class="panel-body">
                        @if(count($posts))

                            @foreach($posts as $post)
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{$post->photo_url}}" alt="..."
                                                             width="200" height="200">
                                                    </a>
                                                </div>
                                                <div class="media-body">

                                                    <h3 class="label-info" style="background-image: url('{{asset('logo/pm.png')}}'); color: white">


                                                        <br> <span style="margin-left: 20px" > {{$post->title}}</span><br> <br>
                                                    </h3>
                                                    <p>
                                                        <h3 class="jumbotron">    {{$post->description}}</h3>
                                                    </p>
                                                    <span class="pull-right">
                                              {{$post->created_at->diffForHumans()}}
                                          </span>

                                                    <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-info btn-group-sm" >
                                                        <img src="{{asset('icon/book_open.png')}}" width="20" height="20">
                                                       <b>Consulter les offres</b> </a>

                                                    <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-default btn-group-sm" >
                                                        <img src="{{asset('logo/mod.png')}}" width="20" height="20">
                                                        <b>   Modifier</b> </a>
                                                    <a href="#"
                                                       onclick="document.getElementById('form-delete{{$post->id}}').submit()"

                                                       class="btn btn-default btn-group-sm" ><img src="{{asset('logo/s.png')}}" width="15" height="15"></a>
                                                    <form id="form-delete{{$post->id}}" action="{{route('posts.destroy',['id'=>$post->id])}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {{$posts->links()}}
                                </div>
                            </div>


                        @else
                            <p class="alert alert-warning">
                                Pas de publications
                            </p>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-group-sm">

                            <b>     Demander devis </b>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

