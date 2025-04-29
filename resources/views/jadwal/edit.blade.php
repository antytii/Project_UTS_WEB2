<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Speedboat</title>

    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .edit-card {
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }
        .btn-custom {
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>

<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">✏️ Edit Jadwal Speedboat</h2>

    <div class="card edit-card">
        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal" class="form-label fw-semibold">📅 Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label for="tujuan" class="form-label fw-semibold">🎯 Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $jadwal->tujuan }}" required>
            </div>

            <div class="mb-3">
                <label for="waktu" class="form-label fw-semibold">⏰ Waktu</label>
                <input type="time" class="form-control" id="waktu" name="waktu" value="{{ $jadwal->waktu }}" required>
            </div>

            <div class="mb-3">
                <label for="rute_id" class="form-label fw-semibold">🗺️ Pilih Rute</label>
                <select name="rute_id" id="rute_id" class="form-select" required>
                    <option value="">-- Pilih Rute --</option>
                    @foreach ($rutes as $rute)
                        <option value="{{ $rute->id }}" {{ $jadwal->rute_id == $rute->id ? 'selected' : '' }}>
                            {{ $rute->asal }} - {{ $rute->tujuan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label fw-semibold">👥 Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ $jadwal->kapasitas }}" required>
            </div>

            <div class="mb-3">
                <label for="speedboad_id" class="form-label fw-semibold">🚤 Pilih Speedboad</label>
                <select name="speedboad_id" id="speedboad_id" class="form-select">
                    <option value="">-- Pilih Speedboad --</option>
                    @foreach ($speedboads as $speedboad)
                        <option value="{{ $speedboad->id }}" {{ $jadwal->speedboad_id == $speedboad->id ? 'selected' : '' }}>
                            {{ $speedboad->nama }} (Kapasitas: {{ $speedboad->kapasitas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-lg btn-custom">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary btn-lg btn-custom">
                    <i class="bi bi-arrow-left-circle"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<x-footer />
</html>
