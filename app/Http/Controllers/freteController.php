<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class freteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fretes = DB::select
        ('
            select f.*,
                   ca.modelo,
                   cg.descricao
              from frete f,
                   caminhao ca,
                   carga cg
             where f.caminhao_id = ca.id
               and f.carga_id    = cg.id
        ');
        return view('fretes.index')->with('fretes', $fretes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caminhoes = DB::select('select * from caminhao');
        $cargas    = DB::select('select * from carga');
        return view('fretes.create')->with('caminhoes', $caminhoes)->with('cargas', $cargas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo_carga = $request->input('descricao');
        $valor = $request->input('valor');
        $kilometros = $request->input('kilometros');
        $caminhao_id = $request->input('caminhao');
        $carga_id = $request->input('carga');

        if(DB::insert('insert into frete (tipo_carga, valor, kilometros, caminhao_id, carga_id) values (?, ?, ?, ?, ?)', [$tipo_carga, $valor, $kilometros, $caminhao_id, $carga_id])){
            return redirect('/fretes');//->with('success', 'Frete cadastrado com sucesso!');
        }else{
            return redirect('/fretes/criar');//->with('error', 'Erro ao cadastrar frete!');
        }

        // if($tipo_carga == null || $valor == null || $kilometros == null || $caminhao_id == null || $carga_id == null){
        //     return redirect()->route('fretes.create')->with('error', 'Todos os campos devem ser preenchidos!');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
