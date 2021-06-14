@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel">
    <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('jogador.index') }}">Voltar</a></li> </ul>
    <hr />
        <h3>Atualização de Jogador</h3>
        <hr />
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('jogador.update', [$jogador->id]) }}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @include('jogadores._form')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
