@extends('layouts.app')

@section('content')
<div class="container mt-4">
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
    <h2>Edit Rute</h2>

    <form action="{{ route('rute.update', $rute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Rute</label>
            <input type="text" name="nama_rute" value="{{ $rute->nama_rute }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $rute->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('rute.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
