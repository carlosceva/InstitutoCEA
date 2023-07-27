<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Contador;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(1);

        $horarios = Horario::all()
        ->where('estado','activo');
        return view('Horarios.index',compact('horarios','num'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'horainicio' => 'required',
            'horafin' => 'required',
            'turno' => 'required',
            'estado' => 'required',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);

        return view('Horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'horainicio' => 'required',
            'horafin' => 'required',
            'turno' => 'required',
            'estado' => 'required',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update(['estado' => 'inactivo']);

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}
