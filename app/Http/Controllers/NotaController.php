<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Alumno;
use App\Models\Modulo;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(8);

        $modulos = Modulo::all()->where('estado','activo');
        $alumnos = Alumno::all()->where('estado','activo');
        $notas = DB::table('notas as n')
        ->join('modulos as m','m.id','=','n.idmodulo')
        ->join('alumnos as a','a.id','=','n.idalumno')
        ->select('m.nombre as modulo', 'a.nombre as alumno','n.fecha', 'n.estado','n.id', 'a.id as idalumno','m.id as idmodulo','n.nota')
        ->where('n.estado','activo')
        ->orderBy('n.id','asc')
        ->get();

        return view('notas.index', compact('modulos','alumnos','notas','num'));
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
        $usuario = Auth::user()->id;
        $fechaActual = Carbon::now()->format('Y-m-d');

        $request->validate([
            'idalumno' => 'required|exists:alumnos,id',
            'idmodulo' => 'required|exists:modulos,id',
            'nota' => 'required|numeric|min:0|max:100',
        ]);
        
        try {
            $nota = Nota::create([
                'idalumno' => $request->input('idalumno'),
                'idmodulo' => $request->input('idmodulo'),
                'nota' => $request->input('nota'),
                'fecha' => $fechaActual,
                'estado' => 'activo',
            ]);

            $nota->save();

            Session::flash('success', 'Nota agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar nota.');
        }
    
        return redirect()->route('notas.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {    
            $nota = Nota::findOrFail($id);
            $nota->update($request->all());
            
            Session::flash('success', 'Nota editada exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al editar la nota.');
        }

        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $nota = Nota::findOrFail($id);
            
            $nota->update(['estado' => 'inactivo']);
            
            Session::flash('success', 'Nota eliminada exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al eliminar la nota.');
        }

        return redirect()->route('notas.index');
    }

}
