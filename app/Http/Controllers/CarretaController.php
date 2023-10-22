<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarretaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carretas = DB::select('select * from carreta');
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
        $tipo = $request->input('tipo');
        $capacidade = $request->input('capacidade');
        $ano = $request->input('ano');

        if (DB::insert('insert into carreta (tipo, capacidade_carga, ano_fabricacao) values (?, ?, ?)', [$tipo, $capacidade, $ano])){
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
