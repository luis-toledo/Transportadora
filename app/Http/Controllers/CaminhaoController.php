<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaminhaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $caminhoes = DB::select
        ('
            select c.*,
                   m.nome,
                   cr.tipo
              from caminhao c,
                   motorista m,
                   carreta cr
             where c.motorista_id = m.id
               and c.carreta_id  = cr.id
        ');
        return view('caminhoes.index')->with('caminhoes', $caminhoes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motoristas = DB::select
        ('
            select *
              from motorista
             where id not in (select motorista_id from caminhao)
        ');

        $carretas = DB::select
        ('
            select *
              from carreta
             where id not in (select carreta_id from caminhao)
        ');
        return view('caminhoes.create')->with('motoristas', $motoristas)->with('carretas', $carretas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $modelo = $request->input('modelo');
        $placa = $request->input('placa');
        $categoria = $request->input('categoria');
        $ano = $request->input('ano');
        $motorista_id = $request->input('motorista');
        $carreta_id = $request->input('carreta');

        if(DB::insert('insert into caminhao (modelo, placa, categoria_cnh_necessaria, ano, motorista_id, carreta_id) values (?, ?, ?, ?, ?, ?)', [$modelo, $placa, $categoria, $ano, $motorista_id, $carreta_id])){
            return redirect('/caminhoes');
        }else{
            return redirect('/caminhoes/criar');
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
