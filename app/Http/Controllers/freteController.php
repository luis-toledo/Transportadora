<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use App\Models\Carga;
use App\Models\Frete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fretes = Frete::join('caminhoes', 'fretes.caminhao_id', '=', 'caminhoes.id')
        ->join('cargas', 'fretes.carga_id', '=', 'cargas.id')
        ->select('fretes.*', 'caminhoes.modelo', 'cargas.descricao')
        ->get();
        return view('fretes.index')->with('fretes', $fretes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caminhoes = Caminhao::all();
        $cargas    = Carga::all();
        return view('fretes.create')->with('caminhoes', $caminhoes)->with('cargas', $cargas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $frete = new Frete();
        $frete->tipo_carga = $request->input('descricao');
        $frete->valor = $request->input('valor');
        $frete->kilometros = $request->input('kilometros');
        $frete->caminhao_id = $request->input('caminhao');
        $frete->carga_id = $request->input('carga');

        if($frete->save()){
            return redirect('/fretes');
        }else{
            return redirect('/fretes/criar');
        }

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
        Frete::where('id', $id)->delete();

        return view('fretes.delete');
    }
}
