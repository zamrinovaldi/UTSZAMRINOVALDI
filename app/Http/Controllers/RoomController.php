<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type' => 'required',
            'price_per_night' => 'required|numeric',
            'status' => 'required'
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required',
            'price_per_night' => 'required|numeric',
            'status' => 'required'
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil diupdate.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
