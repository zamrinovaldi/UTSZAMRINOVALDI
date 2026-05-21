@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Reservasi</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tamu</label>
                <select name="guest_id" class="form-control" required>
                    <option value="">Pilih Tamu</option>
                    @foreach($guests as $guest)
                    <option value="{{ $guest->id }}" {{ $reservation->guest_id == $guest->id ? 'selected' : '' }}>{{ $guest->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kamar</label>
                <select name="room_id" class="form-control" required>
                    <option value="">Pilih Kamar</option>
                    @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $reservation->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }} - {{ $room->room_type }} (Rp {{ number_format($room->price_per_night, 2) }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Check-In</label>
                <input type="date" name="check_in_date" class="form-control" value="{{ $reservation->check_in_date }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Check-Out</label>
                <input type="date" name="check_out_date" class="form-control" value="{{ $reservation->check_out_date }}" required>
            </div>
            <div class="form-group">
                <label>Total Harga</label>
                <input type="number" name="total_price" class="form-control" value="{{ $reservation->total_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
