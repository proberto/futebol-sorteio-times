@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel" id="list">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('home') }}">Inicio</a></li>
            </ul>
            <hr />
            <h3>Times Sorteados</h3>
            @foreach( $times as $time)
                <div class="row well well-sm">
                    <div class="col-sm-3">
                        <p>{{$time->name}}</p>
                    </div>
                </div>
                @foreach($jogadorTimes as $jogadorTime)
                    <div class="row well well-sm">
                        <div class="col-sm-3">
                            <p>{{$jogadorTime->name}}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection
