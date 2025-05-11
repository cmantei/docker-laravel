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
        return view('taller.index', compact('citas'));
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
        $clientes = User::where('role', 'cliente')->get();
        $cita = Cita::with('cliente')->findOrFail($id);
        return view('taller.edit', compact('cita', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $citastaller)
    {
        // Validar los datos
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'duracion_estimada' => 'required|string',
            'cliente_id' => 'required|exists:users,id',
        ]);
        
        // Extraer el cliente_id y quitar del array para actualizar
        $clienteId = $validated['cliente_id'];
        unset($validated['cliente_id']);
        
        // Actualizar los campos básicos
        $citastaller->fill($validated);
        
        // Asociar el cliente mediante la relación
        $cliente = User::findOrFail($clienteId);
        $citastaller->cliente()->associate($cliente);
        
        $citastaller->save();
        
        return redirect()->route('citastaller.index')->with('success', 'Cita actualizada correctamente.');
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
