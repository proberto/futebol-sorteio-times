@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel">
    <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('usuarios.index') }}">Voltar</a></li>
                <li>
                    <a class="btn btn-danger" href="{{ route('usuarios.destroy', [$usuario->id]) }}" onclick="event.preventDefault();
                    if(confirm('Deseja excluir esse usuario?')){document.getElementById('form-delete').submit();}">Excluir</a>
                    <form id="form-delete" style="display: none" action="{{route('usuarios.destroy', [$usuario->id]) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                </li>
            </ul>
    <hr />
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                    </div>
                    <div class="col-md-6">
                        {{$usuario->name}}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    </div>
                    <div class="col-md-6">
                        {{ $usuario->email }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
