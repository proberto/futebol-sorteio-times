@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel" id="list">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('presenca.create') }}">Novo</a></li>
            </ul>
            <hr />
            <form method="POST" action="{{ route('pesquisar') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="data" class="col-md-2 col-form-label text-md-right">{{ __('Data do Jogo') }}</label>

                    <div class="col-md-3">
                        <input id="datajogo" type="date" class="form-control" name="data">
                    </div>
                    <button class="btn btn-primary" id="search">
                        Buscar
                    </button>
                </div>
            </form>
            <h3>Jogos Confirmados</h3>
            @foreach( $jogos as $jogo)
                <div class="row well well-sm">
                    <div class="col-sm-3">
                        <p>{{$jogo->name}}</p>
                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-1">
                        <p><a class="btn btn-primary" href="{{ route('presenca.edit', [$jogo->id]) }}">Alterar</a></p>
                    </div>
                    <div class="col-sm-3">
                        <p><a class="btn btn-primary" href="{{ route('presenca.show', [$jogo->id]) }}">Jogadores Confirmados</a></p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
