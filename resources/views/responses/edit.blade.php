<form action="{{route('responses.update',['id'=>$response->id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PUT')}}
    <input type="hidden" value="{{$post->id}}" name="post_id">
    <div class="form-group{{ $errors->has('
    description') ? ' has-error' : '' }}">


        <div class="">
<textarea id="description"
          type="text"
          class="form-control"
          name="description"
          required
          rows="10"
          placeholder="description">{{ $response->description }}
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
            <input id="address" type="text" class="form-control" name="address" value="{{ $response->address}}" required
                   placeholder="address">

            @if ($errors->has('address'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">


        <div class="">
            <input id="price" type="text" class="form-control" name="price" value="{{ $response->price }}" required
                   placeholder="prix">

            @if ($errors->has('price'))
                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('qte') ? ' has-error' : '' }}">


        <div class="">
            <input id="qte" type="text" class="form-control" name="qte" value="{{ $response->qte }}" required
                   placeholder="quantité">

            @if ($errors->has('qte'))
                <span class="help-block">
                                        <strong>{{ $errors->first('qte') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="devis">Attacher des photos</label>
        <input type="file" name="images[]" multiple>
    </div>


    <div class="form-group{{ $errors->has('devis') ? ' has-error' : '' }}">
        <label for="devis">Attacher un devis</label>
        <input type="file" name="devis">
        @if ($errors->has('devis'))
            <span class="help-block">
                                        <strong>{{ $errors->first('devis') }}</strong>
                                    </span>

        @endif
    </div>

    <div class="form-group">

        <button class="btn btn-default my-2 my-sm-0" type="submit">
            <img src="{{asset('logo/checked.png')}}" class="icon-bar">&nbsp;<b>Enregistrer</b></button>
    </div>
</form>