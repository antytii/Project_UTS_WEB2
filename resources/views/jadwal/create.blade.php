<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>

    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<li class="nav-item" style="list-style: none;">
    <a href="{{ route('home') }}" class="btn btn-light me-2">
        <i class="bi bi-house-door"></i> Kembali ke Dashboard
    </a>
</li>
<div class="card shadow-lg border-0 rounded-4 p-4 mb-4">
    <h4 class="text-center fw-bold">Jadwal Speedboat</h4>
    <h5 class="text-center mt-2">Tambah Jadwal Baru</h5>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Speedboat</label>
            <input type="text" name="nama_speedboat" class="form-control rounded-3" required>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border"><i class="bi bi-calendar"></i></span>
                    <input type="date" name="tanggal" class="form-control rounded-3" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Waktu</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border"><i class="bi bi-clock"></i></span>
                    <input type="time" name="waktu" class="form-control rounded-3" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Pilih Rute</label>
                <select name="rute_id" class="form-select rounded-3" required>
                    <option value="">-- Pilih Rute --</option>
                    @foreach($rutes as $rute)
                        <option value="{{ $rute->id }}">{{ $rute->asal }} - {{ $rute->tujuan }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control rounded-3" min="1" required>
        </div>

        <div class="mb-3">
    <label for="speedboad_id" class="form-label">Pilih Speedboad</label>
    <select name="speedboad_id" id="speedboad_id" class="form-select">
        <option value="">-- Pilih Speedboad --</option>
        @foreach ($speedboads as $speedboad)
            <option value="{{ $speedboad->id }}">{{ $speedboad->nama }} (Kapasitas: {{ $speedboad->kapasitas }})</option>
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-3">
            <i class="bi bi-plus-circle"></i> Tambahkan
        </button>
    </form>

</div>
<x-footer />
