<?php

namespace App\Http\Controllers\API;

use App\Estado;
use App\Profissao;
use App\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados    = Estado::all();
        $profissoes = Profissao::all();

        return response()->json([
            'estados' => $estados, 
            'profissoes' => $profissoes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'fone' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:App\Profissional,email',
            'estado' => 'required|integer',
            'cidade' => 'required|integer',
            'profissao' => 'required|integer'
        ]);

        $profissional               = new Profissional;

        $profissional->nome         = $request->nome;
        $profissional->nascimento   = $request->nascimento;
        $profissional->fone         = $request->fone;
        $profissional->email        = $request->email;
        $profissional->estado_id    = $request->estado;
        $profissional->cidade_id    = $request->cidade;
        $profissional->profissao_id = $request->profissao;

        $profissional->save();
        return $profissional;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load_cidades(){

    }
}
