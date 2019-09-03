@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #ebee91">
                        <img   style=' ' alt="" src="{{asset('pictures/e.png')}}"  width="50" height="50" CLASS="carousel">
                        <b>Modifier ma demande</b>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('posts.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label">Titre</label>

                                <div class="">
                                    <input id="title" type="text" class="form-control" name="title" value="{{$post->title }}" required>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">Description</label>

                                <div class="">
                                    <textarea
                                            id="description"
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            rows="10"
                                            required>
                                        {{ $post->description }}
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="control-label">Addresse</label>

                                <div class="">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $post->address }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="control-label">Télephone</label>

                                <div class="">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{$post->phone}}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category" class="control-label">Categorie</label>

                                <div class="">
                                    <select name="category_id" class="form-control" >
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id==$post->category_id?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                                <label for="region" class="control-label">Region</label>

                                <div class="">
                                    <select name="region_id" class="form-control">
                                        @foreach($regions as $region)
                                            <option value="{{$region->id}}" {{$region->id==$post->region_id?'selected':''}}>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('region_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Photo">Attacher un photo</label>
                                <input type="file" name="avatar" >
                            </div>

                            <div class="form-group">
                                <button class="btn btn-default my-2 my-sm-0" type="submit">
                                    <img src="{{asset('logo/checked.png')}}" class="icon-bar">&nbsp;<b>Enregistrer</b></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection