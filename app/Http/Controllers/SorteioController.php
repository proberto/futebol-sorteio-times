<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Presenca;
use Illuminate\Http\Request;

class SorteioController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        return view('sorteio.sorteio', compact('jogos'));
    }

    public function sorteioJogo($id)
    {
        $jogo = Jogo::findorfail($id);
        $mensagem = null;
        return view('sorteio.times', compact('jogo', 'mensagem'));
    }

    public function sorteioTimes(Request $request)
    {
        $jogo = $request['jogo'];
        $mensagem = null;
        return view('sorteio.times', compact('jogo', 'mensagem'));
    }

    public function sorteando(Request $request)
    {
        $qtdtime = $request['qtdtime'];
        $jogadores_confirmados = Presenca::where('id_jogo', $request['id_jogo'])->count();
        if(($qtdtime * 2) > $jogadores_confirmados)
        {
            $mensagem = "Não temos a quantidade de jogadores confirmado suficiente para formar dois times";
            $jogo = $request['id_jogo'];
            return view('sorteio.times', compact('jogo', 'mensagem'));
        }
        $numeroTimes = $jogadores_confirmados/$qtdtime;
        $modNumTimes = $jogadores_confirmados%$qtdtime;
        if($modNumTimes == 0){
            $numTimes = $numeroTimes;
        }
        else{
            $numTimes = intval($numeroTimes) + 1;
        }

    }
}
