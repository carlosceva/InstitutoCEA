<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Carrera;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contar = new Contador();
        $num = $contar->contarModel(4);

        $carreras = Carrera::all()->where('estado','activo');
        //$ofertas = Oferta::where('estado','activo')->orderBy('id','asc')->get();

        $ofertas = DB::table('ofertas as of')
        ->join('carreras as ca','ca.id','=','of.idcarrera')
        ->select('ca.nombre as carrera','of.fecha','of.estado','of.id')
        ->where('of.estado','activo')
        ->orderBy('of.id','asc')
        ->get();

        return view('ofertas.index', compact('carreras', 'ofertas','num'));
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
            'estado' => 'required|string|in:activo,inactivo',
            'idcarrera' => 'required|exists:carreras,id',
        ]);
        try {
            $oferta = new Oferta([
                'fecha' => $request->input('fecha'),
                'estado' => $request->input('estado'),
                'idcarrera' => $request->input('idcarrera'),
            ]);
        
            $oferta->save();

            Session::flash('success', 'Oferta agregada exitosamente.');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocurrió un error al guardar la oferta.');
        }

        return redirect()->route('ofertas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string|in:activo,inactivo',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $oferta = Oferta::findOrFail($id);
        $oferta->update($request->all());

        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->update(['estado' => 'inactivo']);

        return redirect()->route('ofertas.index')->with('success', 'Oferta eliminada exitosamente.');
    }
}
