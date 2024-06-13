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
    <script src="assets/static/js/initTheme.js"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url('admin/peliputan') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="/template/dist/assets/compiled/svg/logo.svg">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Nama Pelanggan</h4>
            </div>
            <div class="card-body">
                @foreach ($dataPermohonan as $permohonan)
                    <p>{{ $permohonan->pesan }}</p>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Data Permohonan</h4>
                                <form action="{{ url('admin/peliputan/pilih-petugas/'.$permohonan->id_pesanan) }}" class="form" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="feedback1" class="sr-only">Waktu Mulai</label>
                                            <input type="text" id="feedback1" class="form-control"
                                                placeholder="{{ $permohonan->waktu_mulai }}" name="waktu_mulai" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback4" class="sr-only">Link Mentahan</label>
                                            <input type="text" id="feedback4" class="form-control"
                                                placeholder="{{ $permohonan->link_mentahan }}" name="link_mentahan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback2" class="sr-only">Tenggat Pengerjaan</label>
                                            <input type="text" id="feedback2" class="form-control"
                                                placeholder="{{ $permohonan->tenggat_pengerjaan }}" name="tenggat_pengerjaan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback2" class="sr-only">Pertanyaan 1</label>
                                            <input type="text" id="feedback2" class="form-control"
                                                   value="{{ $permohonan->pertanyaan_1 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_1" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback2" class="sr-only">Pertanyaan 2</label>
                                            <input type="text" id="feedback2" class="form-control"
                                                   value="{{ $permohonan->pertanyaan_2 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_2" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback2" class="sr-only">Pertanyaan 3</label>
                                            <input type="text" id="feedback2" class="form-control"
                                                   value="{{ $permohonan->pertanyaan_3 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_3" readonly>
                                        </div>
                                    </div>
                                    <div class="form-actions d-flex justify-content-end grid gap-1">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            ACC
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Petugas</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Pilih Petugas Yang Mengerjakan</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <ul class="list-unstyled mb-0 d-flex flex-column">
                                                                        @php $i = 1; @endphp
                                                                        @foreach ($dataPetugas as $petugas)
                                                                            <li class="d-inline-block me-2 mb-1">
                                                                                <div class="form-check">
                                                                                    <div class="checkbox">
                                                                                        <input name="petugas" value="{{ $petugas->id_petugas }}" type="checkbox" id="checkbox{{ $i }}" class="form-check-input" checked>
                                                                                        <label for="checkbox{{ $i }}">{{ $petugas->nama_petugas }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            @php $i++; @endphp
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-danger me-1">Tolak</button>
                                        <button type="reset" class="btn btn-secondary">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="/template/dist/assets/compiled/js/app.js"></script>
</body>

</html>
