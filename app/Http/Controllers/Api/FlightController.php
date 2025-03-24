<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = flight::all();
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
            'airplane_id'      => 'required',
            'flight_number'    => 'required',
            'departure_airport' => 'required',
            'arrival_airport'  => 'required',
            'departure_time'   => 'required',
            'arrival_time'     => 'required',
            'price'            => 'required',
            'picture'          => 'required',
            'available_seats'  => 'required',
            'status'           => 'required'
        
        ]);
        
        $flight = Flight::create($validated);
        return response()->json($flight, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = flight::findOrFail($id);
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
        $flight = flight::findOrFail($id);

        if (!$flight) {
            return response()->json(['message' => 'Flight not found'], 404);
        }

        $validated = $request->validate([
            'airplane_id'      => 'required',
            'flight_number'    => 'required',
            'departure_airport' => 'required',
            'arrival_airport'  => 'required',
            'departure_time'   => 'required',
            'arrival_time'     => 'required',
            'price'            => 'required',
            'picture'          => 'required',
            'available_seats'  => 'required',
            'status'           => 'required'
        
        ]);
        $flight->update(array_filter($validated));
        return response()->json($flight, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = flight::findOrFail($id);  
        $flight->delete();
    }
}
