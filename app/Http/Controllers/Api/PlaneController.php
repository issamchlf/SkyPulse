<?php

namespace App\Http\Controllers\Api;

use App\Models\plane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = plane::all();
        return response()->json($planes);
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
        $validated = $request->validate([
            'name'     => 'required',
            'type'     => 'required',
            'max_seats'=> 'required',
            'picture'  => 'required'
        
        ]);
        
        $airplane = plane::create($validated);
        return response()->json($airplane);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $airplane = plane::findOrFail($id);
        return response()->json($airplane);
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
        $airplane = plane::findOrFail($id);

        if (!$airplane) {
            return response()->json(['message' => 'Airplane not found'], 404);
        }

        $validated = $request->validate([
            'name'     => 'required',
            'type'     => 'required',
            'max_seats'=> 'required',
            'picture'  => 'required'
        ]);

        $airplane->update(array_filter($validated));
        return response()->json($airplane, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airplane = plane::findOrFail($id);  
        $airplane->delete();
    }
}
