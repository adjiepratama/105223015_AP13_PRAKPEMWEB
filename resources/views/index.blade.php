<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-aspirasi { border-left: 5px solid #0d6efd; transition: 0.3s; }
        .card-aspirasi:hover { transform: translateY(-3px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .bg-gradient-primary { background: linear-gradient(90deg, #0d6efd 0%, #0a58ca 100%); }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-gradient-primary mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1"> E-Aspirasi Warga</span>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">
                         Tulis Aspirasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aspirasi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="" selected disabled>Pilih Kategori...</option>
                                    <option value="Kebersihan">Kebersihan</option>
                                    <option value="Infrastruktur">Infrastruktur (Jalan/Jembatan)</option>
                                    <option value="Keamanan">Keamanan</option>
                                    <option value="Pelayanan">Pelayanan Publik</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Isi Aspirasi</label>
                                <textarea name="isi_laporan" class="form-control" rows="4" placeholder="Jelaskan aspirasi atau keluhan Anda..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Kirim Aspirasi</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h5 class="mb-3 text-secondary">Aspirasi Terkini ({{ $aspirasis->count() }})</h5>
                
                @forelse($aspirasis as $item)
                    <div class="card mb-3 shadow-sm card-aspirasi">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-subtitle text-muted small">
                                    Oleh: <strong>{{ $item->nama_pengirim }}</strong> 
                                    &bull; {{ $item->created_at->diffForHumans() }}
                                </h6>
                                <span class="badge bg-secondary">{{ $item->kategori }}</span>
                            </div>
                            <p class="card-text">{{ $item->isi_laporan }}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        Belum ada aspirasi yang masuk. Jadilah yang pertama!
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>