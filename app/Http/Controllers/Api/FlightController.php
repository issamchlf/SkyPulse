<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();
        return response()->json($flights);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created flight resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plane_id' => 'required|exists:planes,id',
            'flight_number' => 'required|string',
            'departure_airport' => 'required|string',
            'arrival_airport' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'price' => 'required|numeric|min:0',
            'available_seats' => 'required|integer|min:0',
            'status' => 'required|boolean'
        ]);
        
        // Convert datetime strings to Carbon instances
        $validated['departure_time'] = Carbon::parse($validated['departure_time']);
        $validated['arrival_time'] = Carbon::parse($validated['arrival_time']);
        
        $flight = Flight::create($validated);
        return response()->json($flight, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::findOrFail($id);
        return response()->json($flight);
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
        $flight = Flight::findOrFail($id);

        $validated = $request->validate([
            'plane_id' => 'sometimes|exists:planes,id',
            'flight_number' => 'sometimes|string',
            'departure_airport' => 'sometimes|string',
            'arrival_airport' => 'sometimes|string',
            'departure_time' => 'sometimes|date',
            'arrival_time' => 'sometimes|date|after:departure_time',
            'price' => 'sometimes|numeric|min:0',
            'available_seats' => 'sometimes|integer|min:0',
            'status' => 'sometimes|boolean'
        ]);

        // Convert datetime strings to Carbon instances if they exist
        if (isset($validated['departure_time'])) {
            $validated['departure_time'] = Carbon::parse($validated['departure_time']);
        }
        if (isset($validated['arrival_time'])) {
            $validated['arrival_time'] = Carbon::parse($validated['arrival_time']);
        }

        $flight->update($validated);
        return response()->json($flight, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return response()->json(['message' => 'Flight deleted successfully'], 200);
    }
}
