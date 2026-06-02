<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center my-4">Data Peserta Ujian</h3>
            <hr>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('pesertas.create') }}" class="btn btn-success mb-3">+ Tambah Peserta</a>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto Peserta</th>
                                <th>Nama</th>
                                <th>No Ujian</th>
                                <th>Nilai Ujian</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                   <img src="{{ asset('storage/pesertas/' . $peserta->foto) }}"
                                         width="70" height="70"
                                         style="object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>{{ $peserta->nama }}</td>
                                <td>{{ $peserta->no_ujian }}</td>
                                <td>
                                    <span class="badge {{ $peserta->nilai_ujian >= 75 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $peserta->nilai_ujian }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pesertas.edit', $peserta->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('pesertas.destroy', $peserta->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data peserta.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pesertas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>