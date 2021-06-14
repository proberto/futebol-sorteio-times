@csrf

<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

    <div class="col-md-8">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $jogador->name }}" required>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="nivel" class="col-md-2 col-form-label text-md-right">{{ __('Nível') }}</label>

    <div class="col-md-2">
        <label>
            <input id="nivel" type="radio" class="form-control" name="nivel" value="1" {{ $jogador->nivel == '1' ? 'checked="checked"':''}}>1
        </label>
    </div>

    <div class="col-md-2">
        <label>
            <input id="nivel" type="radio" class="form-control" name="nivel" value="2" {{ $jogador->nivel == '2' ? 'checked="checked"':''}}>2
        </label>
    </div>

    <div class="col-md-2">
        <label>
            <input id="nivel" type="radio" class="form-control" name="nivel" value="3" {{ $jogador->nivel == '3' ? 'checked="checked"':''}}>3
        </label>
    </div>

    <div class="col-md-2">
        <label>
            <input id="nivel" type="radio" class="form-control" name="nivel" value="4" {{ $jogador->nivel == '4' ? 'checked="checked"':''}}>4
        </label>
    </div>

    <div class="col-md-2">
        <label>
            <input id="nivel" type="radio" class="form-control" name="nivel" value="5" {{ $jogador->nivel == '5' ? 'checked="checked"':''}}>5
        </label>
    </div>
</div>

<div class="form-group row">
    <label for="goleiro" class="col-md-2 col-form-label text-md-right">{{ __('É goleiro?') }}</label>

    <div class="col-md-2">
        <label>
            <input id="goleiro" type="radio" class="form-control" name="goleiro" value="true" {{ $jogador->goleiro == 'true' ? 'checked="checked"':''}}>Sim
        </label>
    </div>

    <div class="col-md-2">
        <label>
            <input id="goleiro" type="radio" class="form-control" name="goleiro" value="false" {{ $jogador->goleiro == 'false' ? 'checked="checked"':''}}>Não
        </label>
    </div>
</div>


