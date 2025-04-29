@extends('layouts.app')

@section('title', 'Daftar Speedboad')

@section('content')
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4 text-center fw-bold">Daftar Speedboad</h3>

        <div class="mb-3 text-end">
            <a href="{{ route('speedboad.create') }}" class="btn btn-success">
                ➕ Tambah Speedboad
            </a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($speedboads as $speedboad)
                    <tr>
                        <td>{{ $speedboad->nama }}</td>
                        <td>{{ $speedboad->kapasitas }}</td>
                        <td>{{ $speedboad->deskripsi }}</td>
                        <td>
                            <a href="{{ route('speedboad.edit', $speedboad->id) }}" class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('speedboad.destroy', $speedboad->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
