<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $trabajadores = Trabajador::all();
    $hoy = \Carbon\Carbon::today(); 

    foreach ($trabajadores as $trabajador) {
        $fechaNacimiento = \Carbon\Carbon::parse($trabajador->fecha_nacimiento); 
        
        if ($fechaNacimiento->month == $hoy->month && $fechaNacimiento->day == $hoy->day) {
            $trabajador->cumpleAniosHoy = true;
        } else {
            $trabajador->cumpleAniosHoy = false;
        }
    }

    
    return view('trabajador.index', compact('trabajadores'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trabajador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string',
            'email' => 'required|email|max:255',
            'foto' => 'nullable|string',
            'departamento' => 'required',
            'fecha_nacimiento' => 'required|date',

            'cargos' => 'required|array',
            'cargos.*' => 'string|in:director,operario,lead',
        ]);
        $validate['mayor55'] = $request->has('mayor55');
        $validate['sustituto'] = $request->has('sustituto');
        $validate['cargos'] = json_encode($validate['cargos']);
        Trabajador::create($validate);
        return redirect()->route('trabajador.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trabajador = Trabajador::find($id);
        return view('trabajador.show', compact('trabajador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trabajador = Trabajador::find($id);
        $trabajador->cargos= json_decode($trabajador->cargos,true);
        return view('trabajador.edit', compact('trabajador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string',
            'email' => 'required|email|max:255',
            'foto' => 'nullable|string',
            'departamento' => 'required',
            'fecha_nacimiento' => 'required|date',

            'cargos' => 'required|array',
            'cargos.*' => 'string|in:director,operario,lead',
        ]);
        $validate['mayor55'] = $request->has('mayor55');
        $validate['sustituto'] = $request->has('sustituto');
        $validate['cargos'] = json_encode($validate['cargos']);
        $trabajador = Trabajador::find($id);
        $trabajador->update($validate);
        return redirect()->route('trabajador.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::find($id);
        $trabajador->delete();
        return redirect()->route('trabajador.index');
    }

    public function filtro(Request $request)
    {
        $filtro = $request->filtro;

        switch ($filtro) {
            case 'Nombre':
                $trabajadores = Trabajador::orderBy('nombre', 'asc')->get();

                break;
            case 'Apellidos':
                $trabajadores = Trabajador::orderBy('apellidos', 'asc')->get();
                break;
            case 'Fecha':
                $trabajadores = Trabajador::orderBy('fecha_nacimiento', 'desc')->get();
                break;
            case 'Mayor':
                $trabajadores = Trabajador::where('mayor55', true)->get();
                break;
            case 'Sustituto':
                $trabajadores = Trabajador::where('sustituto', true)->get();
                break;
            case 'Electronica':
                $trabajadores = Trabajador::where('departamento', '=', 'electronica')->get();
                break;
            case 'Cristales':
                $trabajadores = Trabajador::where('departamento', '=', 'cristales')->get();
                break;
            case 'Oficina':
                $trabajadores = Trabajador::where('departamento', '=', 'oficina')->get();
                break;
            case 'Director':
                $query = Trabajador::query();
                    $query->whereJsonContains('cargos', 'director');
                $trabajadores=$query->get();
                break;
            case 'Operario':
                $query = Trabajador::query();
                    $query->whereJsonContains('cargos', 'operario');
                $trabajadores=$query->get();
                break;
            case 'Lead':
                $query = Trabajador::query();
                $query->whereJsonContains('cargos', 'lead');
            $trabajadores=$query->get();
                break;
            case '':
                return redirect()->route('trabajador.index');
                break;
        }

        return view('trabajador.index', compact('trabajadores'));
    }
}
