@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel" id="list">
    <div class="conteudo_painel_int">
        <ul class="nav nav-pills" role="tablist">
            <li><a class="btn btn-primary" href="{{ route('jogador.create') }}">Novo</a></li>
        </ul>
    <hr />
        <h3>Listagem de Jogadores</h3>
        <div class="row well well-sm">
            <div class="col-sm-3">
                <p>Código</p>
            </div>
            <div class="col-sm-3">
                <p>Nome</p>
            </div>

            <div class="col-sm-3">
                <p>Nível</p>
            </div>

            <div class="col-sm-3">
                <p>Ações</p>
            </div>
        </div>

    @foreach( $jogadores as $jogador)
        <div class="row well well-sm">
            <div class="col-sm-3">
                <p>{{$jogador->id}}</p>
            </div>
            <div class="col-sm-3">
                <p>{{$jogador->name}}</p>
            </div>

            <div class="col-sm-3">
                <p>{{$jogador->nivel}}</p>
            </div>

            <div class="col-sm-1">
                <p><a class="btn btn-primary" href="{{ route('jogador.edit', [$jogador->id]) }}">Alterar</a></p>
            </div>
            <div class="col-sm-1">
                <p><a class="btn btn-primary" href="{{ route('jogador.show', [$jogador->id]) }}">Ver</a></p>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
