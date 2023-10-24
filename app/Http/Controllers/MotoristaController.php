<?php

namespace App\Http\Controllers;

use App\Models\Caminhoe;
use App\Models\Motorista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $motoristas = Motorista::all();
        return view('motoristas.index')->with('motoristas', $motoristas);

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
        $motorista = new Motorista();
        $motorista->nome = $request->input('nome');
        $motorista->idade = $request->input('idade');
        $motorista->categoria_cnh = $request->input('categoria');

        if ($motorista->save()){
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
        $motorista = Motorista::find($id);
        return view('motoristas.edit')->with('motorista', $motorista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorista = Motorista::find($id);
        $motorista->nome = $request->input('nome');
        $motorista->idade = $request->input('idade');
        $motorista->categoria_cnh = $request->input('categoria');

        $motorista->save();
        return redirect('/motoristas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Caminhoe::where('motorista_id', $id)->exists()){
            $mensagem = false;
            return view('motoristas.delete')->with('mensagem', $mensagem);

        }else{
            $mensagem = true;
            Motorista::where('id', $id)->delete();
            return view('motoristas.delete')->with('mensagem', $mensagem);
        }
    }
}
