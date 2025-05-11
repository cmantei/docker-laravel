<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$userId = auth()->id();
        $userId = Auth::id();
        $citas = Cita::where('cliente_id', $userId)->get();
        return view('clientes.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Cita::rules());
        //$userId = auth()->id();
        $userId = Auth::id();
        Cita::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'matricula' => $request->matricula,
            'cliente_id' => $userId,

        ]);

        return redirect()->route('citascliente.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $cita = Cita::where('id', $id)->where('cliente_id', $user->id)->firstOrFail();
        return view('clientes.show', compact('cita', 'user'));
    }

}
