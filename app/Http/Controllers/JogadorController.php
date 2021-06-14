<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogadores = Jogador::all();
        return view('jogadores.jogador', compact('jogadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jogador = new Jogador();
        return view('jogadores.create', compact('jogador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goleiro = $request['goleiro'] === 'true' ? true: false;

        Jogador::create([
            'name' => $request['name'],
            'nivel' => $request['nivel'],
            'goleiro' => $goleiro,

        ]);
        $jogadores = Jogador::all();
        return view('jogadores.jogador', compact('jogadores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogador = Jogador::findorfail($id);
        $goleiro = $jogador->goleiro == true ? 'Sim':'Não';
        return view('jogadores.show', compact('jogador', 'goleiro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = Jogador::findorfail($id);
        return view('jogadores.edit', compact('jogador'));
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
        $jogador = Jogador::findorfail($id);
        $goleiro = $request['goleiro'] === 'true' ? true: false;
        $jogador->fill([
            'name' => $request['name'],
            'nivel' => $request['nivel'],
            'goleiro' => $goleiro,
        ]);
        $jogador->update();
        $jogadores = Jogador::all();
        return view('jogadores.jogador', compact('jogadores'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jogador = Jogador::findorfail($id);
        $jogador->delete();
        $jogadores = Jogador::all();
        return view('jogadores.jogador', compact('jogadores'));
    }
}
