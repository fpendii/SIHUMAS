<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">
</head>
<body>
    <div class="container">
        <form action="{{ url('petugas/tugas/editing-video/submit/' . $dataPermohonan->id_pesanan) }}" method="POST">

            @csrf
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Link Hasil tugas {{ $dataPermohonan->jenis_jasa }}</h4>
                    <div class="form-group">
                        <input type="text" id="feedback1" class="form-control @error('link_hasil') is-invalid @enderror"
                        placeholder="Masukkan Link Hasil" name="link_hasil">
                    @error('link_hasil')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                    <h4 class="card-title mt-5">{{ $dataPermohonan->username }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $dataPermohonan->pesan }}</p>
                </div>
                <div class="card">
                    <div class="card-content">
                            <h4 class="card-title">Data Permohonan</h4>
                            <label for="feedback1" class="sr-only">Petugas Yang Mengerjakan</label>
                            <div class="list-group">
                                @foreach ($dataPetugasPesanan as $item)
                                    <span class="list-group-item">
                                        {{ $item->username }}
                                    </span>
                                @endforeach
                                <br>
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                    <label for="unit" class="sr-only">Unit</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" id="unit" class="form-control"
                                    value="{{ $dataPermohonan->unit }}" name="unit" readonly>
                            </div>
                                    <div class="col-md-4">
                                        <label for="link_mentahan">Link Mentahan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="feedback4" class="form-control"
                                        value="{{ $dataPermohonan->link_mentahan }}" name="LastName" readonly>
                                        <a href="{{ $dataPermohonan->link_mentahan }}" target="_blank" class="btn btn-primary btn-sm mt-2">Open Link</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="waktu_mulai">Tanggal Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="waktu_mulai" class="form-control" name="waktu_mulai" value="{{ $dataPermohonan->waktu_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tenggat_pengerjaan">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tenggat_pengerjaan" class="form-control" name="tenggat_pengerjaan" value="{{ $dataPermohonan->tenggat_pengerjaan }}" readonly>
                                        </div>
                                    </div>
                                    
                            <div class="form-actions d-flex justify-content-end gap-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('petugas') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/template/dist/assets/compiled/js/app.js"></script>
</body>
</html>
