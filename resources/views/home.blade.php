<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>

    <!-- Import Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .custom-card {
            padding: 2rem;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
@include('components.navbar')

    <main class="container text-center py-4">
        <!-- ✅ Notifikasi pesan flash -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Jika belum login -->
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg shadow-sm mb-4 btn-custom">
                <i class="bi bi-person-circle"></i> Buat Akun / Login
            </a>
        @endguest

        <!-- Card Konten -->
        <div class="col-md-8 mx-auto custom-card">
            <h1 class="fw-bold">Selamat Datang di Sistem Jadwal Speedboat</h1>
            <p class="text-muted">Tunggu apa lagi, mari atur jadwal perjalanan anda!</p>

            @auth
                <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                    <!-- Tombol Lihat Jadwal (boleh semua user) -->
                    <a href="{{ route('jadwal.index') }}" class="btn btn-primary btn-lg btn-custom">
                        <i class="bi bi-calendar-check"></i> Lihat Jadwal
                    </a>

                    <!-- Tombol Tambah Jadwal, Tambah Rute, dan Tambah Speedboad (hanya admin) -->
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('jadwal.create') }}" class="btn btn-success btn-lg btn-custom">
                            <i class="bi bi-plus-circle"></i> Tambah Jadwal
                        </a>
                        <a href="{{ route('rute.create') }}" class="btn btn-warning btn-lg btn-custom">
                            <i class="bi bi-signpost-split"></i> Tambah Rute
                        </a>
                        <a href="{{ route('speedboad.create') }}" class="btn btn-info btn-lg btn-custom">
                            <i class="bi bi-speedometer2"></i> Tambah Speedboad
                        </a>
                    @endif

                    <!-- Tombol Logout -->
                    
                </div>
            @endauth
        </div>
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>