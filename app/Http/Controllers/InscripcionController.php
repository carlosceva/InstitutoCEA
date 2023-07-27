<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Contador;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(9);

        $carreras = Carrera::all()->where('estado','activo');
        $alumnos = Alumno::all()->where('estado','activo');
        $modulos = Modulo::all()->where('estado','activo');

        $inscripciones = DB::table('inscripciones as i')
        ->join('carreras as ca','ca.id','=','i.idcarrera')
        ->join('alumnos as a','a.id','=','i.idalumno')
        ->join('users as u','u.id','=','i.idusuario')
        ->select('ca.nombre as carrera', 'a.nombre as alumno','u.name as usuario','i.fecha', 'i.estado','i.id', 'a.id as idalumno','ca.id as idcarrera')
        ->where('i.estado','activo')
        ->orderBy('i.id','asc')
        ->get();

        return view('inscripciones.index', compact('carreras', 'alumnos', 'inscripciones','modulos','num'));
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
            'idcarrera' => 'required|exists:carreras,id',
        ]);
        
        try {
            $inscripcion = Inscripcion::create([
                'idalumno' => $request->input('idalumno'),
                'idcarrera' => $request->input('idcarrera'),
                'idusuario' => $usuario,
                'fecha' => $fechaActual,
                'estado' => 'activo',
            ]);

            $inscripcion->save();

            Session::flash('success', 'Inscripcion agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar inscripcion.');
        }
    
        return redirect()->route('inscripciones.index');
    }

    public function storeM(Request $request)
    {
        $request->validate([
            'idalumno' => 'required|exists:alumnos,id',
            'idmodulo' => 'required|exists:modulos,id',
        ]);
        
        try {
                $idalumno = $request->input('idalumno');
                $idmodulo = $request->input('idmodulo');
                DB::table('alumno_modulo')->insert([
                    'idalumno' => $idalumno,
                    'idmodulo' => $idmodulo,
                    // Agrega aquí los demás campos y sus valores
                ]);

            Session::flash('success', 'Inscripcion agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar inscripcion.');
        }
    
        return redirect()->route('inscripciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idcarrera' => 'required|exists:carreras,id',
            'idalumno' => 'required|exists:alumnos,id',
        ]);

        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->update($request->all());

        return redirect()->route('inscripciones.index')->with('success', 'Inscripcion actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->update(['estado' => 'inactivo']);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripcion eliminada exitosamente.');
    }
}
