<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $query = Flight::query();

        if ($request->filled('airlines')) {
            $query->whereIn('airline', $request->airlines);
        }

        if ($request->filled('stops')) {
            $query->where('stops', $request->stops);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('time')) {
            switch ($request->time) {
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

        if ($request->filled('trip_type')) {
            $query->where('trip_type', $request->trip_type);
        }

        $flights = $query->paginate(10);
        $flights->appends($request->query());

        return view('flight', compact('flights'));
    }

    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.flight.create');
        }
    }

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

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    public function edit(Flight $flight)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.flight.edit', compact('flight'));
        }
        abort(403, 'Unauthorized action.');
    }

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

    public function destroy(Flight $flight)
    {
        if (Auth::guard('admin')->check()) {
            $flight->delete();
            return redirect()->route('flight.index');
        }
        abort(403, 'Unauthorized action.');
    }

    public function book(Request $request, $flightId) 
    {
        $request->validate([
            'seats' => 'required|integer|min:1',
        ]);

        $flight = Flight::findOrFail($flightId);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to book a flight.');
        }

        $user = Auth::user();

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'seats' => $request->seats,
            'total_price' => $flight->price * $request->seats,
            'status' => 'pending'
        ]);

        $flight->decrement('available_seats', $request->seats);

        return redirect()->route('flights')->with('success', 'Flight booked successfully!');
    }

    public function debook(Flight $flight)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $flight->users()->detach($user->id);
            return redirect()->route('flight.index');
        }
        return redirect()->route('login')->with('error', 'Please log in to debook a flight.');
    }
}
