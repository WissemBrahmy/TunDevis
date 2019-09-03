@extends('layouts.app')

@section('content')

    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="center-block" alt="" src="{{asset('logo/imm.png')}}" width="1138" height="50" >
                <div class="carousel-caption">
                    <div style="margin-left: 460px; color: #1d24ee; margin-bottom: 130px ">
                    <h2 style="margin-bottom: 50px">Vous avez un projet ?</h2>
                        <h3 style="color: #ee6412; margin-bottom: 100px"> <strong>Publiez votre demande de devis en 1 minute...</strong>
                     </h3>
                    </div>
                </div>
                <div class="carousel-caption">
                    <div style="margin-right: 520px; color: #f6ffee; margin-bottom: 250px ">
                        <h2>Publiez gratuitement</h2>

                    </div>
                </div>
            </div>
            <div class="item">
                <img class="center-block" alt="" src="{{asset('logo/2.png')}}" width="1138" height="50" >
                <div class="carousel-caption">

                <img class="center-block" alt="" src="{{asset('logo/cc.png')}}" width="150" height="150"  style="margin-left: 770px;margin-bottom: 110px">
                </div>
                <div class="carousel-caption">


                    <h2 style=" color: #ee6412; margin-bottom: 130px;margin-left: 70px;">
                       <strong>  Comparez des prix <br> pour un même produit ou service ! </strong></h2>

                </div>
            </div>
            <div class="item">
                <img class="center-block" alt="" src="{{asset('logo/t.png')}}" width="1138" height="50" >

                <div class="carousel-caption">



                </div>

                <div class="carousel-caption">
                    <h2 style="color: #289fee; margin-bottom: 230px; margin-right: 500px">Vous cherchez d'un prestataires fiables ?</h2>


                </div>
                <div class="carousel-caption">




                           <div  style="margin-right: 500px;  margin-top: 130px;">
                              <strong>
                               <H1 STYLE="color: #ee6412"> Sans Engagement</H1>
                                  <br><br>
                                  <label class="media-object">
                              <h4 STYLE="color: #eeb00e">  Trouvez la plus avantageuse... </h4>
                                  </label>
                              </strong> 

                               <br><br>

                           </div>

                </div>
            </div>
        </div>
        <!-- Carousel nav -->

    </div>





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
                    <div class="panel-heading" style="background-image: url('{{asset('logo/r.png')}}')">

                                     <div class="text-center" >
                                        <form class="form-inline">

                                            <select name="category_id" class="form-control" style="padding-right: 80px">
                                                <option></option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id==app('request')->input('category_id')?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <select name="region_id" class="form-control" style="padding-right: 80px">
                                                <option></option>
                                                @foreach($regions as $region)
                                                    <option value="{{$region->id}}" {{$region->id==app('request')->input('region_id')?'selected':''}}>{{$region->name}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary my-2 my-sm-0" type="submit"><img src="{{asset('logo/search.png')}}" class="icon-bar">&nbsp;<b>Search</b></button>
                                        </form>


                                     </div>
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
                                                        <img class="mr-1 img-circle" src="{{$post->photo_url}}" alt="..."
                                                             width="200" height="200">
                                                    </a>

                                                    <img  class="mr-1 img-circle" src="{{$post->user->avatar?$post->user->avatar:asset('logo/compte.png')}}" alt="..."
                                                         width="50" height="50" style="margin-left: 75px" >
                                                        <h4 style="padding-left: 50px">{{$post->user->name}}</h4>
                                                </div>
                                                <div class="media-body">

                                                    <h3 class="thumbnail" style="background-image: url('{{asset('logo/pm.png')}}'); color: white">


                                                      <br> <span style="margin-left: 20px"><strong> {{$post->title}}</strong></span> <br><br>
                                                    </h3>

                                                        <h3 class="jumbotron" >     {{$post->description}}
                                                                <br><br>

                                              <span>
                                                  <img src="{{asset('logo/alarm.png')}}" cl>   {{$post->created_at->diffForHumans()}} </span>
                                                    <br>
                                                        </h3>
                                                </div>
                                                <div class="media-right">
                                                            <br>

                                                    <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-default btn-group-sm" >
                                                        <img  src="{{asset('logo/add.png')}}" class="icon-bar">&nbsp;<b>Donner une Offre</b></a>


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
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection

