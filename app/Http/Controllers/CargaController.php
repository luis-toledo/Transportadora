<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargas = DB::select('select * from carga');
        return view('cargas.index')->with('cargas', $cargas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cargas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $descricao = $request->input('descricao');
        $peso = $request->input('peso');

        if (DB::insert('insert into carga (descricao, peso) values (?, ?)', [$descricao, $peso])){
            return redirect('/cargas');
        }else{
            return redirect('/cargas/criar');
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
        if(DB::select('select * from frete where carga_id = ?', [$id])){
            $mensagem = false;
            return view('cargas.delete')->with('mensagem', $mensagem);
        }else{
            $mensagem = true;
            DB::delete('delete from carga where id = ?', [$id]);
            return view('cargas.delete')->with('mensagem', $mensagem);
        }
    }
}
