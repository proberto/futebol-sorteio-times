@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('home') }}">Inicio</a></li> </ul>
            <hr />
            <h3>Sorteio de Times - Escolher Jogo</h3>
            <hr />
            @if ($mensagem != null)
                <div class="row">
                    <p class="danger">{{$mensagem}}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{route('sorteando')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="qtdtime" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade de Jogadores por time') }}</label>

                            <div class="col-md-5">
                                <input id="qtdtime" type="text" class="form-control {{ $errors->has('qtdtime') ? ' is-invalid' : '' }}" name="qtdtime">
                                @if ($errors->has('qtdtime'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qtdtime') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input id="id_jogo" type="hidden" name="id_jogo" value="{{ $jogo->id }}">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sortear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
