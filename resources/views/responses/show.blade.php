<div class="media" id="response-{{$response->id}}">
    <div class="media-left">
        <a href="#">
            <img class="mr-1 img-circle" src="{{$response->user->avatar?$response->user->avatar:asset('logo/compte.png')}}" alt="..."
              width="50" height="50" style="" >
        </a>
    </div>
    <div class="media-body">

        <span class="pull-right">{!! $response->confirmed?'<label  class="thumbnail"><b>Acceptée</b> </label>':'<label  class="thumbnail"> <b>Pas encore acceptée</b><br></label>'!!}</span>

        <h2 class="media-heading">{{$response->user->name}}</h2>

        <p>
            <strong>  {{$response->description}}</strong> <br>
            <strong>Contact:&nbsp{{$response->user->email}} et GSM:&nbsp{{$response->user->phone}}</strong>
        </p>

        <div class="pull-right">
        <span>Télecharger le Devis&nbsp; <a href="{{$response->devis_url}}" > <img src="{{asset('logo/pdf.png')}}" width="20" height="20"></a> </span>
            <br><br>
            @if($response->user_id!=Auth::user()->id)

                <form action="{{route('responses.confirm',['id'=>$response->id])}}" method="POST">
                    {{csrf_field()}}
                    <button class="pull-right btn btn-default btn-sm" type="submit">{{$response->confirmed?'Ignorer?':'Accepter?'}}</button>
                </form>
            @endif
            <br>
        <span > {{$response->created_at->diffForHumans()}} </span>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(count($response->attachments))
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators" style="">
                        @foreach($response->attachments  as $index=>$attachment)
                            <li data-target="#myCarousel" data-slide-to="{{$index}}" class="active"></li>
                        @endforeach
                    </ol>
                    <!-- Carousel items -->
                        <div class="carousel-inner" role="listbox" style=" width:100%; height: 200px !important;">
                            @foreach($response->attachments  as $index=>$attachment)
                                <div class="item {{$index==0?'active':''}}">
                                    <img class="center-block" alt="" src="{{$attachment->url}}">
                                    <div class="carousel-caption">

                                    </div>
                                </div>

                            @endforeach

                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <img class="center-block" alt="" src="{{asset('icon/arrow_left.png')}}" width="20" height="20" style="margin-top: 300px" >

                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <img class="center-block" alt="" src="{{asset('icon/arrow_right.png')}}" width="20" height="20" style="margin-top: 300px" >
                    </a>
                </div>

               @endif

            </div>

        </div>


        @if($response->user_id==Auth::user()->id)

            <button  class="btn btn-default btn-group-sm" id="btn-edit-response" data-id="{{$response->id}}"><img src="{{asset('logo/repeat.png')}}" class="icon-bar" >&nbsp<b>Actualiser </b></button>
            <button
               onclick="document.getElementById('response-delete{{$response->id}}').submit()"

               class="btn btn-default btn-group-sm" ><img src="{{asset('logo/s.png')}}" class="icon-bar"></button>
            <form id="response-delete{{$response->id}}" action="{{route('responses.destroy',['id'=>$response->id])}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </form>
        @else

        @endif
    </div>
</div>