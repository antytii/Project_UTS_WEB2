@extends('layouts.app')

@section('title', 'Edit Speedboad')

@section('content')
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4 text-center fw-bold">Edit Speedboad</h3>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('speedboad.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-list-ul"></i> Lihat Daftar Speedboad
            </a>
        </div>

        <form action="{{ route('speedboad.update', $speedboad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Speedboad</label>
                <input type="text" name="nama" id="nama" value="{{ $speedboad->nama }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" id="kapasitas" value="{{ $speedboad->kapasitas }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $speedboad->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Update
            </button>
        </form>
    </div>
</div>
@endsection
