@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kamar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nomor Kamar</label>
                <input type="text" name="room_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="text" name="room_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga per Malam</label>
                <input type="number" name="price_per_night" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
