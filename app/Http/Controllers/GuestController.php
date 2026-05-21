<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:guests',
            'phone_number' => 'required'
        ]);

        Guest::create($request->all());
        return redirect()->route('guests.index')->with('success', 'Tamu berhasil ditambahkan.');
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:guests,email,' . $guest->id,
            'phone_number' => 'required'
        ]);

        $guest->update($request->all());
        return redirect()->route('guests.index')->with('success', 'Tamu berhasil diupdate.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('guests.index')->with('success', 'Tamu berhasil dihapus.');
    }
}
