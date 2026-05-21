<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['room', 'guest'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::all();
        $guests = Guest::all();
        return view('reservations.create', compact('rooms', 'guests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric'
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        $guests = Guest::all();
        return view('reservations.edit', compact('reservation', 'rooms', 'guests'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric'
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil diupdate.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}
