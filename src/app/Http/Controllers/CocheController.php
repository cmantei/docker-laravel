<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Coche::all());
        //$coches = Coche::where('user_id', auth()->id())->get();
        //return response()->json($coches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Coche::rules());
        $validatedData['user_id'] = auth()->id();
        $producto = Coche::create($validatedData);
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coche = Coche::findOrFail($id);
        return response()->json($coche);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(Coche::rules());
        $coche = Coche::findOrFail($id);
        $coche->update($validatedData);
        return response()->json($coche);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coche = Coche::findOrFail($id);
        Coche::destroy($id);
        $cocheNull = Coche::find($id);
        if ($coche && !$cocheNull)
        {
            return response()->json(null, 204);
        }
        else
        {
            return response()->json(
                [
                'message' => $cocheNull,
                'errors' => 'Coche no borrado',
                ],
                409
                );
        }
    }
}