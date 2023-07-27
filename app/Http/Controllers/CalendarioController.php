<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\User;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(5);

        $docentes = User::all()->where('estado','activo')->where('rol','Docente');

        $calendarios = DB::table('calendarios as c')
        ->join('users as u','u.id','=','c.iduser')
        ->select('c.id','c.fecha','c.descripcion','c.estado','u.name as docente')
        ->where('c.estado','activo')
        ->where('u.estado','activo')
        ->orderBy('c.id','asc')
        ->get();

        return view('calendarios.index', compact('docentes', 'calendarios','num'));
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
            'descripcion' => 'required|string|max:255',
        ]);
        try {
            $calendario = new Calendario([
                'iduser' => $request->input('iddocente'),
                'descripcion' => $request->input('descripcion'),
                'fecha' => $request->input('fecha'),
                'estado' => $request->input('estado'),
            ]);
        
            $calendario->save();

            Session::flash('success', 'Calendario agregado exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar calendario.');
        }

        return redirect()->route('calendarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $calendario = Calendario::findOrFail($id);
        $calendario->update($request->all());

        return redirect()->route('calendarios.index')->with('success', 'Calendario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calendario = Calendario::findOrFail($id);
        $calendario->update(['estado' => 'inactivo']);

        return redirect()->route('calendarios.index')->with('success', 'Calendario eliminada exitosamente.');
    }
}
