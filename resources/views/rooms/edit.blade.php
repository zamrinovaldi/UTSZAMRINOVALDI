@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Kamar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nomor Kamar</label>
                <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
            </div>
            <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="text" name="room_type" class="form-control" value="{{ $room->room_type }}" required>
            </div>
            <div class="form-group">
                <label>Harga per Malam</label>
                <input type="number" name="price_per_night" class="form-control" value="{{ $room->price_per_night }}" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
