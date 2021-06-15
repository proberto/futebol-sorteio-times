<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Jogo;
use App\Models\Presenca;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresencaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = Jogo::all();
        return view('presenca.presenca', compact('jogos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jogos = new Jogo();
        $presencas = new Presenca();
        $jogadores = Jogador::all();
        return view('presenca.create', compact('presencas', 'jogadores', 'jogos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request['datajogo'];
        $dia = substr($data, 8, 2);
        $mes = substr($data, 5, 2);
        $ano = substr($data, 0, 4);
        $nome_jogo = "Jogo do dia ".$dia."-".$mes."-".$ano;
        Jogo::create([
            'name' => $nome_jogo,
            'datajogo' => $data,
        ]);
        $id_jogo = Jogo::max('id');
        $jogadores = Jogador::all();
        foreach ($jogadores as $jogador){
            if ($request['presenca'.$jogador->id] == "P"){
                Presenca::create([
                    'id_jogador' => $jogador->id,
                    'presenca' => $request['presenca'.$jogador->id],
                    'id_jogo' => $id_jogo
                ]);
            }
        }
        $jogos = Jogo::all();
        return view('presenca.presenca', compact('jogos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogo = Jogo::findorfail($id);
        $jogadores = DB::table('presencas')
            ->join('jogadors','jogadors.id','presencas.id_jogador')
            ->join('jogos','jogos.id','presencas.id_jogo')
            ->select('jogadors.name')
            ->where('jogos.id', $id)
            ->get();
            return view('presenca.show', compact('jogadores', 'jogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogos = Jogo::findorfail($id);
        $jogadores = Jogador::all();
        return view('presenca.edit', compact('jogos','jogadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request['datajogo'];
        $dia = substr($data, 8, 2);
        $mes = substr($data, 5, 2);
        $ano = substr($data, 0, 4);
        $nome_jogo = "Jogo do dia ".$dia."-".$mes."-".$ano;
        $jogo = Jogo::findorfail($id);
        $jogo->fill([
            'name' => $nome_jogo,
            'datajogo' => $data,
        ]);
        $jogo->update();
        $presenca = Presenca::where('id_jogo', $id);
        $presenca->delete();
        $jogadores = Jogador::all();
        foreach ($jogadores as $jogador){
            if ($request['presenca'.$jogador->id] == "P"){
                Presenca::create([
                    'id_jogador' => $jogador->id,
                    'presenca' => $request['presenca'.$jogador->id],
                    'id_jogo' => $id
                ]);
            }
        }
        $jogos = Jogo::all();
        return view('presenca.presenca', compact('jogos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenca = Presenca::where('id_jogo', $id);
        $presenca->delete();
        $jogo = Jogo::findorfail($id);
        $jogo->delete();
        $jogos = Jogo::all();
        return view('presenca.presenca', compact('jogos'));
    }

    public function pesquisar(Request $request)
    {
        $busca = $request['data'];
        $jogos = Jogo::whereRaw('datajogo =  ? ', ["{$busca}"])->get();
        return view('presenca.presenca', compact('jogos'));
    }

}
