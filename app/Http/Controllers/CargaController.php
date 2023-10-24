<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Frete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargas =  Carga::all();
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
        $carga = new Carga();
        $carga->descricao = $request->input('descricao');
        $carga->peso = $request->input('peso');

        if ($carga->save()){
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
        $carga = Carga::find($id);
        return view('cargas.edit')->with('carga', $carga);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carga = Carga::find($id);
        $carga->descricao = $request->input('descricao');
        $carga->peso = $request->input('peso');

        $carga->save();
        return redirect('/cargas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(Frete::where('carga_id', $id)->exists()){
            $mensagem = false;
            return view('cargas.delete')->with('mensagem', $mensagem);
        }else{
            $mensagem = true;
            Carga::where('id', $id)->delete();
            return view('cargas.delete')->with('mensagem', $mensagem);
        }
    }
}
