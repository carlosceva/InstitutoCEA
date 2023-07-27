<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Carrera;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(7);

        $carreras = Carrera::all()->where('estado','activo');

        $modulos = DB::table('modulos as m')
        ->join('carreras as ca','ca.id','=','m.idcarrera')
        ->select('ca.nombre as carrera','m.nombre','m.sigla','m.estado','m.id')
        ->where('m.estado','activo')
        ->orderBy('m.id','asc')
        ->get();

        return view('modulos.index', compact('carreras', 'modulos','num'));
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
            'idcarrera' => 'required|exists:carreras,id',
            'nombre' => 'required|string|max:255',
        ]);
        try {
            $modulo = new Modulo([
                'idcarrera' => $request->input('idcarrera'),
                'nombre' => $request->input('nombre'),
                'sigla' => $request->input('sigla'),
                'estado' => 'activo',
            ]);
        
            $modulo->save();

            Session::flash('success', 'Modulo agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar el modulo.');
        }

        return redirect()->route('modulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modulo $modulo)
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
        ]);

        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());

        return redirect()->route('modulos.index')->with('success', 'Modulo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $modulo = Modulo::findOrFail($id);
            
            $modulo->update(['estado' => 'inactivo']);
            
            Session::flash('success', 'Modulo eliminado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al eliminar el modulo.');
        }

        return redirect()->route('modulos.index');
    }
}
