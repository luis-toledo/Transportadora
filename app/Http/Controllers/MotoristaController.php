<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = DB::select('select * from motorista');
        return view('motoristas.index')->with('motoristas', $motoristas);
        //return view('caminhoes.index')->with('html', $html);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motoristas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $categoria = $request->input('categoria');

        if (DB::insert('insert into motorista (nome, idade, categoria_cnh) values (?, ?, ?)', [$nome, $idade, $categoria])){
            return redirect('/motoristas');
        }else{
            return redirect('/motoristas/criar');
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
