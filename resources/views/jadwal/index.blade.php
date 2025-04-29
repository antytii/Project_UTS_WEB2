<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Speedboat</title>
    
    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Jadwal Speedboat</h2>

        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('jadwal.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Jadwal
                </a>
            @endif
        @endauth
    </div>
    <li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>


    <div class="card shadow-lg rounded-4 border-0 p-4">
        <h5 class="text-center fw-bold mb-3">Daftar Jadwal Speedboat</h5>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Speedboat</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tujuan</th>
                        <th>Kapasitas</th>
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $index => $jadwal)
                        <tr>
                            <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                            <td>{{ $jadwal->nama_speedboat }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}</td>
                            <td>{{ $jadwal->tujuan }}</td>
                            <td class="text-center">{{ $jadwal->kapasitas }}</td>

                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <td class="text-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">
                                <i class="bi bi-exclamation-circle"></i> Belum ada jadwal tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-footer />

</html>
