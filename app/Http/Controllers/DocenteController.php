<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(2);

        $docentes = User::where('estado','activo')->where('rol','Docente')->orderBy('id','asc')->get();

        return view('docentes.index', compact('docentes','num'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'telefono' => 'required|integer',
        ]);
        
        try {
            $docente = Docente::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'rol' => 'Docente',
                'estado' => 'activo',
                'fecha_nac' => $request->input('fecha_nac'),
                'telefono' => $request->input('telefono'),
            ]);

            $docente->save();

            Session::flash('success', 'Docente agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar docente.');
        }
    
        return redirect()->route('docentes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $docente->id,
                'fecha_nac' => 'required|date',
                'telefono' => 'required|string',
                // Añade las demás validaciones según tus necesidades
            ]);
        
            $docente->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'fecha_nac' => $request->input('fecha_nac'),
                'telefono' => $request->input('telefono'),
                // Añade los demás campos según tus necesidades
            ]);
        
            return redirect()->route('docentes.index', ['docente' => $docente->id])->with('success', 'Docente actualizado exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->update(['estado' => 'inactivo']);

        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
