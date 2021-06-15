@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('home') }}">Inicio</a></li> </ul>
            <hr />
            <h3>Sorteio de Times - Escolher Jogo</h3>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{route('sorteioTimes')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="turma" class="col-md-4 col-form-label text-md-right">{{ __('Jogos') }}</label>
                            <div class="col-md-6">
                                <select id="jogo"  class="form-control" name="jogo">
                                    <option value="selecione" >selecione um jogo</option>
                                    @foreach( $jogos as $jogo )
                                        <option value="{{ $jogo->id }}"  >{{ $jogo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
