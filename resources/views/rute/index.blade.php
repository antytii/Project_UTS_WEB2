@extends('layouts.app')

@section('content')
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="container">
    <h3>Daftar Rute</h3>
    <a href="{{ route('rute.create') }}" class="btn btn-success mb-2">Tambah Rute</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rutes as $rute)
                <tr>
                    <td>{{ $rute->asal }}</td>
                    <td>{{ $rute->tujuan }}</td>
                    <td>
                        <a href="{{ route('rute.edit', $rute->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rute.destroy', $rute->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
