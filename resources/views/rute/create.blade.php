@extends('layouts.app')

@section('title', 'Tambah Rute')

@section('content')
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Tambah Rute</h4>

        <!-- ✅ Tombol Lihat Daftar Rute -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('rute.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-list-ul"></i> Lihat Daftar Rute
            </a>
        </div>

        <form action="{{ route('rute.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="asal" class="form-label">Asal</label>
                <input type="text" name="asal" id="asal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection

