<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::all();
        return view('taller.index', compact('citas'));
    }

    public function pendientes()
    {
        $citas = Cita::where('fecha', null)->get();
        return view('taller.pendientes', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = User::where('role', 'cliente')->get();
        return view('taller.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Cita::rules());

        Cita::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'matricula' => $request->matricula,
            'cliente_id' => $request->cliente_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'duracion_estimada' => $request->duracion,
        ]);

        return redirect()->route('citastaller.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Cita::with('cliente')->findOrFail($id);
        return view('taller.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::with('cliente')->findOrFail($id);
        return view('taller.edit', compact('cita'));
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
        $cita = Cita::with('cliente')->findOrFail($id);
        $cita->delete();
        return redirect()->route('citastaller.index')->with('success', 'Usuario borrado correctamente.');
    }
}
