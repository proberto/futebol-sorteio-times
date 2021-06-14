@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel">
    <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('jogador.index') }}">Voltar</a></li>
                <li>
                    <a class="btn btn-danger" href="{{ route('jogador.destroy', [$jogador->id]) }}" onclick="event.preventDefault();
                    if(confirm('Deseja excluir esse jogador?')){document.getElementById('form-delete').submit();}">Excluir</a>
                    <form id="form-delete" style="display: none" action="{{route('jogador.destroy', [$jogador->id]) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                </li>
            </ul>
    </div>
    <hr />
    <h3>Dados dos Jogadores</h3><br>
    <hr />
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        {{ $jogador->name }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nivel" class="col-md-2 col-form-label text-md-right">{{ __('Nivel') }}</label>

                    <div class="col-md-6">
                        {{ $jogador->nivel }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="goleiro" class="col-md-2 col-form-label text-md-right">{{ __('É goleiro?') }}</label>

                    <div class="col-md-6">
                        {{ $goleiro }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
