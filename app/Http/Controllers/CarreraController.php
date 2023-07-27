<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horario;
use App\Models\Contador;
use Illuminate\Support\Facades\Session;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(3);

        $carreras = Carrera::all()->where('estado','activo');
        $users = User::all();
        $horarios = Horario::where('estado','activo')->orderBy('id','asc')->get();

        return view('carreras.index', compact('carreras', 'users', 'horarios','num'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'estado' => 'required|string|in:activo,inactivo',
            'iduser' => 'required|exists:users,id',
            'idhorario' => 'required|exists:horarios,id',
        ]);
        try {
            $carrera = new Carrera([
                'nombre' => $request->input('nombre'),
                'sigla' => $request->input('sigla'),
                'estado' => $request->input('estado'),
                'iduser' => $request->input('iduser'),
                'idhorario' => $request->input('idhorario'),
            ]);
        
            $carrera->save();

            Session::flash('success', 'Carrera agregada exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar la carrera.');
        }

        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'estado' => 'required|string|in:activo,inactivo',
            'user_id' => 'required|exists:users,id',
            'horario_id' => 'required|exists:horarios,id',
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->update(['estado' => 'inactivo']);

        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente.');
    }
}
