<?php

namespace App\Http\Controllers;

use App\Models\Caminhoe;
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
        $caminhoes = Caminhoe::join('motoristas', 'caminhoes.motorista_id', '=', 'motoristas.id')
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
        $motoristas = Motorista::whereNotIn('id', function ($query) {
            $query->select('motorista_id')
                ->from('caminhoes');
        })->get();

        $carretas = Carreta::whereNotIn('id', function ($query) {
            $query->select('carreta_id')
                ->from('caminhoes');
        })->get();

        return view('caminhoes.create')->with('motoristas', $motoristas)->with('carretas', $carretas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $caminhao = new Caminhoe();
        $caminhao->modelo = $request->input('modelo');
        $caminhao->placa = $request->input('placa');
        $caminhao->categoria_cnh_necessaria = $request->input('categoria');
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
        $caminhao = Caminhoe::find($id);

        $motoristas = Motorista::whereNotIn('id', function ($query) {
            $query->select('motorista_id')
                ->from('caminhoes');
        })->get();

        $carretas = Carreta::whereNotIn('id', function ($query) {
            $query->select('carreta_id')
                ->from('caminhoes');
        })->get();

        $motorista = Motorista::find($caminhao->motorista_id);

        $carreta = Carreta::find($caminhao->carreta_id);

        return view('caminhoes.edit')->with('caminhao', $caminhao)->with('motoristas', $motoristas)->with('carretas', $carretas)
                    ->with('motorista', $motorista)->with('carreta', $carreta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caminhao = Caminhoe::find($id);
        $caminhao->modelo = $request->input('modelo');
        $caminhao->placa = $request->input('placa');
        $caminhao->categoria_cnh_necessaria = $request->input('categoria');
        $caminhao->ano = $request->input('ano');
        $caminhao->motorista_id = $request->input('motorista');
        $caminhao->carreta_id = $request->input('carreta');

        $caminhao->save();
        return redirect('/caminhoes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(Frete::where('caminhao_id', $id)->exists()){
            $mensagem = false;
            return view('caminhoes.delete')->with('mensagem', $mensagem);
        }else{
            $mensagem = true;
            Caminhoe::where('id', $id)->delete();
            return view('caminhoes.delete')->with('mensagem', $mensagem);
        }
    }
}
