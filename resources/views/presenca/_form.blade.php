@csrf
<div class="form-group row">
    <label for="data" class="col-md-2 col-form-label text-md-right">{{ __('Data do Jogo') }}</label>

    <div class="col-md-4">
        <input id="datajogo" type="date" class="form-control" name="datajogo" value="{{$jogos->datajogo}}">
    </div>
</div>
    @foreach($jogadores as $jogador)
        <div class="form-group row">
            <label for="jogador" class="col-md-2 col-form-label text-md-right">{{ __($jogador->name) }}</label>
            <div class="col-md-3">
                <input type="radio" name="presenca{{$jogador->id}}" id="presenca{{$jogador->id}}" value="P" >Presente
            </div>
            <div class="col-md-3">
                <input type="radio" name="presenca{{$jogador->id}}" id="presenca{{$jogador->id}}" value="A" >Ausente
            </div>
        </div>
    @endforeach
