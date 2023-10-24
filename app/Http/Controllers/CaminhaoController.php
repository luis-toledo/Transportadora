<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use App\Models\Carreta;
use App\Models\Frete;
use App\Models\Motorista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaminhaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caminhoes = Caminhao::join('motoristas', 'caminhoes.motorista_id', '=', 'motoristas.id')
        ->join('carretas', 'caminhoes.carreta_id', '=', 'carretas.id')
        ->select('caminhoes.*', 'motoristas.nome', 'carretas.tipo')
        ->get();
        return view('caminhoes.index')->with('caminhoes', $caminhoes)->with('mensagem', session('mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motoristas = Motorista::whereDoesntHave('caminhoes')
                        ->get();

        $carretas = Carreta::whereDoesntHave('caminhoes')
        ->get();
        return view('caminhoes.create')->with('motoristas', $motoristas)->with('carretas', $carretas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $caminhao = new Caminhao();
        $caminhao->caminhao->modelo = $request->input('modelo');
        $caminhao->placa = $request->input('placa');
        $caminhao->categoria = $request->input('categoria');
        $caminhao->ano = $request->input('ano');
        $caminhao->motorista_id = $request->input('motorista');
        $caminhao->carreta_id = $request->input('carreta');

        if($caminhao->save()){
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
        echo $id;
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

        if(Frete::where('caminhao_id', $id)->exists()){
            $mensagem = false;
            //dd($mensagem);
            return view('caminhoes.delete')->with('mensagem', $mensagem);
        }else{
            $mensagem = true;
            Caminhao::where('id', $id)->delete();
            return view('caminhoes.delete')->with('mensagem', $mensagem);
        }
    }
}
