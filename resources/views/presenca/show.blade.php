@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('presenca.index') }}">Voltar</a></li>
                <li><a class="btn btn-primary" href="{{ route('sorteioJogo', [$jogo->id]) }}">Sortear Times</a></li>
                <li>
                    <a class="btn btn-danger" href="{{ route('presenca.destroy', [$jogo->id]) }}" onclick="event.preventDefault();
                    if(confirm('Deseja excluir esse jogo?')){document.getElementById('form-delete').submit();}">Excluir</a>
                    <form id="form-delete" style="display: none" action="{{route('presenca.destroy', [$jogo->id]) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                </li>
            </ul>
        </div>
        <hr />
        <h3>Lista de jogadores confirmados no {{$jogo->name}}</h3><br>
        <hr />
        @foreach($jogadores as $jogador)
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                {{ $jogador->name }}
            </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
