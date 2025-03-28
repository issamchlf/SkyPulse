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
        $validated = $request->validate([
            'plane_id' => 'required',
            'flight_number' => 'required',
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'available_seats' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        Flight::create($validated);

        return redirect()->back()
            ->with('success', 'Flight created successfully! Redirecting to dashboard...');
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
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

        return redirect()->route('dashboard')->with('success', 'Flight booked successfully!');
    }


}
