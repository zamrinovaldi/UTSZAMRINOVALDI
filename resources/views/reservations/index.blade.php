@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Reservasi</h1>
    <a href="{{ route('reservations.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Reservasi</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tamu</th>
                        <th>Kamar</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $res)
                    <tr>
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->guest->name }}</td>
                        <td>{{ $res->room->room_number }} ({{ $res->room->room_type }})</td>
                        <td>{{ $res->check_in_date }}</td>
                        <td>{{ $res->check_out_date }}</td>
                        <td>Rp {{ number_format($res->total_price, 2) }}</td>
                        <td>
                            <a href="{{ route('reservations.edit', $res->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('reservations.destroy', $res->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus reservasi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
