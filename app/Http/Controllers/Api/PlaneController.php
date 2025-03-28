<?php

namespace App\Http\Controllers\Api;

use App\Models\Plane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plane::all();
        return response()->json($planes);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'max_seats' => 'required|integer|min:1',
            'picture' => 'required|url'
        ]);

        $plane = Plane::create($validated);
        return response()->json($plane, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plane = Plane::findOrFail($id);
        return response()->json($plane);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plane = Plane::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'type' => 'sometimes|string',
            'max_seats' => 'sometimes|integer|min:1',
            'picture' => 'sometimes|url'
        ]);

        $plane->update($validated);
        return response()->json($plane, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plane = Plane::findOrFail($id);
        $plane->delete();
        return response()->json(['message' => 'Plane deleted successfully'], 200);
    }
}
