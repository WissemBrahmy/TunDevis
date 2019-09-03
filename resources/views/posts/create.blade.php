@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <img   style=' ' alt="" src="{{asset('pictures/j.png')}}"  width="50" height="50" CLASS="carousel">
                        <b>  Demander des devis</b>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                           {{method_field('POST')}}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                                <div class="">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required placeholder="Titre">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">


                                <div class="">
                                    <textarea id="description"
                                              type="text"
                                              class="form-control"
                                              name="description"
                                              rows="10"
                                              required
                                              placeholder="Description"
                                    >
                                        {{ old('description') }}
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">


                                <div class="">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder="Addresse">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">


                                <div class="">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="Teléphone">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<div class="form-group">




    <b>Categorie   </b> <select name="category_id" class="btn-default" style="padding-bottom: 5px;padding-top: 5px" >
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif


                                    &nbsp; &nbsp;
    <b>   Region </b> <select name="region_id" class="btn-default" style="padding-bottom: 5px;padding-top: 5px">
                                        @foreach($regions as $region)
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('region_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                    @endif


</div>
                            <div class="form-group">
                                <label for="Photo">Attacher un photo</label>
                                <input type="file" name="avatar" class="">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-default btn-group-sm" type="submit"><img src="{{asset('logo/add.png')}}" class="icon-bar">&nbsp;<b>Enregistrer</b></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection