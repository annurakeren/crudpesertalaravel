<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Tambah Peserta Ujian</h4>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pesertas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Peserta</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                   value="{{ old('nama') }}" placeholder="Masukkan nama peserta" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">No Ujian</label>
                            <input type="text" name="no_ujian" class="form-control"
                                   value="{{ old('no_ujian') }}" placeholder="Contoh: 2024-001" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nilai Ujian</label>
                            <input type="number" name="nilai_ujian" class="form-control"
                                   value="{{ old('nilai_ujian') }}" placeholder="0 - 100"
                                   min="0" max="100" step="0.01" required>
                        </div>
                        <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>