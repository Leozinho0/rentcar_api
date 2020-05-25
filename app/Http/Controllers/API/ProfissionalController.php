<?php

namespace App\Http\Controllers\API;

use App\Estado;
use App\Profissao;
use App\Profissional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfissionalController extends Controller
{
    public function index()
    {
        $profissionais = Profissional::with(['estado', 'cidade', 'profissao'])->get();

        $estados       = Estado::all();
        $profissoes    = Profissao::all();

        return response()->json([
            'estados'       => $estados, 
            'profissoes'    => $profissoes,
            'profissionais' => $profissionais
        ]);
    }

    public function create()
    {
        $estados    = Estado::all();
        $profissoes = Profissao::all();

        return response()->json([
            'estados' => $estados, 
            'profissoes' => $profissoes
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'fone' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:App\Profissional,email',
            'estado_id' => 'required|integer',
            'cidade_id' => 'required|integer',
            'profissao_id' => 'required|integer'
        ]);

        $profissional               = new Profissional;

        $profissional->nome         = $request->nome;
        $profissional->nascimento   = $request->nascimento;
        $profissional->fone         = $request->fone;
        $profissional->email        = $request->email;
        $profissional->estado_id    = $request->estado_id;
        $profissional->cidade_id    = $request->cidade_id;
        $profissional->profissao_id = $request->profissao_id;

        //File Upload
        if($request->upload){
            $path = $request->upload->store('files');
            $profissional->upload = $path;
        }

        $profissional->save();
        return $profissional;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'fone' => 'required|string|max:50',
            'email' => ['required', 'string', 'max:50', Rule::unique('profissionais')->ignore($id)],
            'estado_id' => 'required|integer',
            'cidade_id' => 'required|integer',
            'profissao_id' => 'required|integer'
        ]);

        $profissional               = Profissional::find($id);

        $profissional->nome         = $request->nome;
        $profissional->nascimento   = $request->nascimento;
        $profissional->fone         = $request->fone;
        $profissional->email        = $request->email;
        $profissional->estado_id    = $request->estado_id;
        $profissional->cidade_id    = $request->cidade_id;
        $profissional->profissao_id = $request->profissao_id;

        $profissional->save();
        return $profissional;
    }

    public function destroy($id)
    {
        $profissional = Profissional::find($id);
        $profissional->delete();
        return $profissional;
    }

    public function get_chartdata(){
        //Profissionais X Profissão
        $arr_retorno = DB::table('profissionais')
                        ->rightjoin('profissoes', 'profissionais.profissao_id', '=', 'profissoes.id')
                        ->select(DB::raw("count(profissionais.nome) as quantidade"), 'profissoes.nome')
                        ->whereNull('profissionais.deleted_at')
                        ->groupBy('profissoes.nome')
                        ->get();

        $profissoes  = array();
        $quantidades = array();
        $total       = 0;

        foreach($arr_retorno as $k => $v){
            $profissoes[]  = $v->nome;
            $quantidades[] = $v->quantidade;
            $total         += $v->quantidade;
        }

        //Profissionais X Localização
        $arr_retorno2 = DB::table('profissionais')
                        ->rightjoin('estados', 'profissionais.estado_id', '=', 'estados.id')
                        ->select(DB::raw("count(profissionais.nome) as quantidade"), 'estados.nome')
                        ->whereNull('profissionais.deleted_at')
                        ->groupBy('estados.nome')
                        ->get();

        $estados            = array();
        $quantidade_estados = array();

        foreach($arr_retorno2 as $k => $v){
            $estados[]            = $v->nome;
            $quantidade_estados[] = $v->quantidade;
        }

        $arr_return = [
            'profissoes' => $profissoes,
            'quantidades' => $quantidades,
            'total' => $total,
            'estados' => $estados,
            'quantidade_estados' => $quantidade_estados
        ];

        return response()->json($arr_return);
    }

    public function file_download($id){
        $file = Profissional::find($id);

        if($file->upload){
            return Storage::download($file->upload);
        }
    }
}
