@extends('layouts.app')

@section('title', 'Tambah Speedboad')

@section('content')
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4 text-center fw-bold">Tambah Speedboad Baru</h3>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('speedboad.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-list-ul"></i> Lihat Daftar Speedboad
            </a>
        </div>

        <form action="{{ route('speedboad.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Speedboad</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Maximum</label>
                <input type="number" name="kapasitas" id="kapasitas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
