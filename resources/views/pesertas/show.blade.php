<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/pesertas/'.$peserta->foto) }}" class="rounded w-100">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $peserta->nama }}</h3>
                    <hr>
                    <p><strong>No Ujian:</strong> {{ $peserta->no_ujian }}</p>
                    <p><strong>Nilai Ujian:</strong> {{ $peserta->nilai_ujian }}</p>

                    <a href="{{ route('pesertas.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>