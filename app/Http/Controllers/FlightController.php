<?php

namespace App\Http\Controllers;


use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Flight::query();

        if ($request->has('max_price')&& $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->has('departure_time') && $request->departure_time != '') {
            switch ($request->departure_time) {
                case 'morning':
                    $query->whereTime('departure_time', '>=', '06:00:00')
                          ->whereTime('departure_time', '<', '12:00:00');
                    break;
                case 'afternoon':
                    $query->whereTime('departure_time', '>=', '12:00:00')
                          ->whereTime('departure_time', '<', '18:00:00');
                    break;
                case 'evening':
                    $query->whereTime('departure_time', '>=', '18:00:00')
                          ->whereTime('departure_time', '<', '24:00:00');
                    break;
            }
        }
        if ($request->has('departure_airport') && $request->departure_airport != '') {
            $query->where('departure_airport', $request->departure_airport);
        }
        $flights = $query->get();
    
        return view('flight', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.flight.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $flight = Flight::create([
            'airplane_id'      => $request->airplane_id,
            'flight_number'    => $request->flight_number,    
            'departure_airport' => $request->departure_airport,
            'arrival_airport'  => $request->arrival_airport,
            'departure_time'   => $request->departure_time,
            'arrival_time'     => $request->arrival_time,
            'price'            => $request->price,
            'available_seats'  => $request->available_seats,
            'status'           => $request->status

        ]);
        $flight->save();
        return redirect()->route('flight.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $id)
    {
        $flight = flight::findorfail($id);
        return view('flight.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        if(Auth::guard('admin')->check()) {
            return view('admin.flight.edit', compact('flight'));
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $id)
    {
        $flight = Flight::find($id);
        $flight->update([
            'airplane_id'      => $request->airplane_id,
            'flight_number'    => $request->flight_number,    
            'departure_airport' => $request->departure_airport,
            'arrival_airport'  => $request->arrival_airport,
            'departure_time'   => $request->departure_time,
            'arrival_time'     => $request->arrival_time,
            'price'            => $request->price,
            'available_seats'  => $request->available_seats,
            'status'           => $request->status
        ]);
        $flight->save();
        return redirect()->route('flight.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        if(Auth::guard('admin')->check()) {
            $flight->delete();
            return redirect()->route('flight.index');
        }
        abort(403, 'Unauthorized action.');
    }

    public function book(Flight $flight)
    {
        if(Auth::guard('web')->check()){
            $user = Auth::guard('web')->user();
            $flight->users()->attach($user->id);
            return redirect()->route('flight.index');
        }
        return redirect()->route('login')->with('error', 'Please log in to book a flight.');
    }
    public function debook(Flight $flight)
    {
        if(Auth::guard('web')->check()){
            $user = Auth::guard('web')->user();
            $flight->users()->detach($user->id);
            return redirect()->route('flight.index');
        }
        return redirect()->route('login')->with('error', 'Please log in to debook a flight.');
    }
}
