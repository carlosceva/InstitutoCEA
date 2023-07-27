<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(6);

        $alumnos = Alumno::all()->where('estado','activo');

        return view('alumnos.index', compact('alumnos','num'));
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
            'ci' => 'required',
            'nombre' => 'required|string|max:255',
            'fechanac' => 'required|date',
            'sexo' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string',
        ]);
        try {
            $alumno = new Alumno([
                'ci' => $request->input('ci'),
                'nombre' => $request->input('nombre'),
                'fechanac' => $request->input('fechanac'),
                'sexo' => $request->input('sexo'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'estado' => 'activo',
            ]);
        
            $alumno->save();

            Session::flash('success', 'Alumno agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar alumno.');
        }

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {//protected $fillable = ['ci', 'nombre', 'fechanac', 'sexo','email', 'telefono','estado'];
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|max:255',
            'fechanac' => 'required|date',
            'sexo' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->update(['estado' => 'inactivo']);

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}
