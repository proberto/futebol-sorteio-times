@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel">
    <div class="conteudo_painel_int">
        <ul class="nav nav-pills" role="tablist">
            <li><a class="btn btn-primary" href="{{route('usuarios.create')}}">Novo</a></li> </ul>
    <hr />
        <h3>Listagem de Usuários</h3>
        <div class="row well well-sm">
            <div class="col-sm-2">
                <p>Código</p>
            </div>
            <div class="col-sm-4">
                <p>Nome</p>
            </div>

            <div class="col-sm-4">
                <p>Email</p>
            </div>

            <div class="col-sm-2">
                <p>Ações</p>
            </div>
        </div>

    @foreach( $usuarios as $usuario)
        <div class="row well well-sm">
            <div class="col-sm-2">
                <p>{{$usuario->id}}</p>
            </div>
            <div class="col-sm-4">
                <p>{{$usuario->name}}</p>
            </div>

            <div class="col-sm-4">
                <p>{{$usuario->email}}</p>
            </div>

            <div class="col-sm-1">
                <p><a class="btn btn-primary" href="{{ route('usuarios.edit', [$usuario->id]) }}">Alterar</a></p>
            </div>

            <div class="col-sm-1">
                <p><a class="btn btn-primary" href="{{ route('usuarios.show', [$usuario->id]) }}">Ver</a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
