<?php

namespace App\Http\Controllers;

use App\Models\Jogador_Times;
use App\Models\Jogo;
use App\Models\Presenca;
use App\Models\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $jogo = Jogo::findorfail($request['jogo']);
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
            $numTimes = intval($numeroTimes);
        }

        $jogadores= DB::table('presencas')
            ->join('jogadors','jogadors.id','presencas.id_jogador')
            ->join('jogos','jogos.id','presencas.id_jogo')
            ->select('jogadors.id', 'jogadors.name', 'jogadors.nivel', 'jogadors.goleiro')
            ->where('jogos.id', $request['id_jogo'])
            ->get();

        $g = 0;
        $j = 0;
        foreach ($jogadores as $jogador)
        {
            if ($jogador->goleiro == true)
            {
                $gol[$g] = array('id' => $jogador->id, 'nome' => $jogador->name, 'nivel' => $jogador->nivel);
                $g++;
            }
            else{
                $jog[$j] = array('id' => $jogador->id, 'nome' => $jogador->name, 'nivel' => $jogador->nivel);
                $j++;
            }
        }
        for ($x = 0; $x < $numTimes; $x++)
        {
            $r = $x + 1;
            Time::create([
                'name' => "Time".$r,
                'id_jogo' => $request['id_jogo'],
            ]);

            for ($y = 0; $y < $qtdtime; $y++)
            {
                if($y == 0)
                {
                    $id_time = Time::where('id_jogo', $request['id_jogo'] )->max('id');
                    Jogador_Times::create([
                        'id_time' => $id_time,
                        'id_jogador' => $gol[$y]['id'],
                        'id_jogo' => $request['id_jogo'],
                    ]);
                    $arrg = array_shift($gol);
                }
                else
                {
                    $r = $y - $y;
                    $id_time = Time::where('id_jogo', $request['id_jogo'] )->max('id');
                    Jogador_Times::create([
                        'id_time' => $id_time,
                        'id_jogador' => $jog[$r]['id'],
                        'id_jogo' => $request['id_jogo'],
                    ]);
                    $arrg = array_shift($jog);
                }
            }
        }
        dd($jog);
        $times = Time::where('id_jogo', $request['id_jogo'])->get();
        $jogadorTimes = DB::table('times')
            ->join('jogadors', 'jogadors.id', 'times.id_jogador')
            ->select('jogadors.id', 'jogadors.name', 'times.name')
            ->where('times.id', $times->id)
            ->get();
        return view('sorteio.resultado', compact('times', 'jogadorTimes'));
    }
}
