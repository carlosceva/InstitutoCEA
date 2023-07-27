<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Contador;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notaMinimaAprobacion = 51;

        $cantidadAprobados = DB::table('notas')
            ->where('nota', '>=', $notaMinimaAprobacion)
            ->count();

        $cantidadReprobados = DB::table('notas')
            ->where('nota', '<', $notaMinimaAprobacion)
            ->count();

        $cantidadTotalNotas = $cantidadAprobados + $cantidadReprobados;

        $porcentajeAprobados = ($cantidadTotalNotas > 0) ? ($cantidadAprobados / $cantidadTotalNotas) * 100 : 0;
        $porcentajeReprobados = ($cantidadTotalNotas > 0) ? ($cantidadReprobados / $cantidadTotalNotas) * 100 : 0;

        $cantidadMasculinos = Alumno::where('sexo', 'Masculino')->count();
        $cantidadFemeninos = Alumno::where('sexo', 'Femenino')->count();

        $carreras = Carrera::select('nombre', DB::raw('count(*) as alumnos_inscritos'))
            ->groupBy('nombre')
            ->get();

        return view('reportes.index', compact('carreras','cantidadFemeninos','cantidadMasculinos','cantidadAprobados', 'cantidadReprobados', 'cantidadTotalNotas', 'porcentajeAprobados', 'porcentajeReprobados'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function estadisticas()
    {
            $datos = Contador::select('nombre', 'visitas')->orderBy('id','asc')->get();

        return view('estadisticas.index',compact('datos'));
    }

    public function intruso()
    {
        return view('intruso');
    }
}
