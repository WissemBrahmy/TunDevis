
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
        <div class="container">
        <div class="row">

            <div class="col-md-18">

            <div class="panel panel-default">
            <div class="panel-heading" >
                <img   style=' ' alt="" src="{{asset('logo/12.png')}}"  width="50" height="50" CLASS="carousel">
                <strong>Modifier mes informations</strong>
            </div>
            <div class="panel-body">

<div class="container">
    <div type="hidden" value="{{$u=Auth::user()->id}}"></div>
<form action="{{route('updateInfo',['id'=>$u])}}" method="POST" >
    {{ csrf_field() }}
    {{method_field('PUT')}}
    <input type="hidden" value="{{Auth::user()->id}}" name="id">
    <div class="form-group{{ $errors->has('
    address') ? ' has-error' : '' }}">


        <div class="">
            Addresse
<textarea id="address"
          type="text"
          class="form-control"
          name="address"
          required
          rows="10"
          placeholder="address">{{Auth::user()->address}}
</textarea>

            @if ($errors->has('address'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

Télephone

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">


        <div class="">
            <input id="phone" type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" required
                   placeholder="phone">

            @if ($errors->has('phone'))
                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    Ville
    <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">


        <div class="">
            <input id="ville" type="text" class="form-control" name="ville" value="{{Auth::user()->ville}}" required
                   placeholder="email">

            @if ($errors->has('ville'))
                <span class="help-block">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
            @endif
        </div>
        Email
        <div class="">
            <input id="ville" type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required
                   placeholder="email">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
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
        </div>
    </div>
@endsection