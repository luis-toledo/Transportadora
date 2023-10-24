<?php

namespace App\Http\Controllers;

use App\Models\Caminhoe;
use App\Models\Carreta;
use Illuminate\Http\Request;


class CarretaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carretas = Carreta::all();
        return view('carretas.index')->with('carretas', $carretas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carretas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carreta = new Carreta();
        $carreta->tipo = $request->input('tipo');
        $carreta->capacidade_carga = $request->input('capacidade');
        $carreta->ano_fabricacao = $request->input('ano');

        if ($carreta->save()){
            return redirect('/carretas');
        }else{
            return redirect('/carretas/criar');
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
        $carreta = Carreta::find($id);
        return view('carretas.edit')->with('carreta', $carreta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carreta = Carreta::find($id);
        $carreta->tipo = $request->input('tipo');
        $carreta->capacidade_carga = $request->input('capacidade');
        $carreta->ano_fabricacao = $request->input('ano');

        $carreta->save();
        return redirect('/carretas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(Caminhoe::where('carreta_id', $id)->exists()){
            $mensagem = false;
            return view('carretas.delete')->with('mensagem', $mensagem);
        }else{
            $mensagem = true;
            Carreta::where('id', $id)->delete();
            return view('carretas.delete')->with('mensagem', $mensagem);
        }
    }
}
