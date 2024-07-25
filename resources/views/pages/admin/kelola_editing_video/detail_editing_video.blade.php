<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,..." type="image/png">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="/template/dist/assets/static/js/initTheme.js"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url('admin/editing-video') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="/template/dist/assets/compiled/svg/logo.svg" alt="Logo">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">{{ $dataPermohonan->username }}</h4>
            </div>
            <div class="card-body">
                <p>{{ $dataPermohonan->pesan }}</p>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Data Permohonan</h4>
                            <div class="row">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="unit" class="form-control" value="{{ $dataPermohonan->unit }}" name="unit" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="link_mentahan" class="col-sm-3 col-form-label">Link Mentahan</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="link_mentahan" class="form-control" value="{{ $dataPermohonan->link_mentahan }}" name="link_mentahan" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="waktu_mulai" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="waktu_mulai" class="form-control" value="{{ $dataPermohonan->waktu_mulai }}" name="waktu_mulai" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tenggat_pengerjaan" class="col-sm-3 col-form-label">Tenggat Pengerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="tenggat_pengerjaan" class="form-control @error('tenggat_pengerjaan') is-invalid @enderror" name="tenggat_pengerjaan" value="{{ old('tenggat_pengerjaan') }}">
                                        @error('tenggat_pengerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions d-flex justify-content-end gap-1">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ACC</button>
                                <form action="{{ url('admin/editing-video/tolak/' . $dataPermohonan->id_pesanan) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger me-1">Tolak</button>
                                </form>
                                <a href="{{ url('admin/editing-video') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/editing-video/pilih-petugas/'. $dataPermohonan->id_pesanan) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="tenggat_pengerjaan" value="{{ old('tenggat_pengerjaan') }}">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pilih Petugas Yang Mengerjakan</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0 d-flex flex-column">
                                        @php $i = 1; @endphp
                                        @foreach ($dataPetugas as $item)
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <input name="petugas[]" value="{{ $item->id_akun }}" type="checkbox" id="checkbox{{ $i }}" class="form-check-input" checked>
                                                        <label for="checkbox{{ $i }}">{{ $item->username }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @php $i++; @endphp
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/template/dist/assets/compiled/js/app.js"></script>
    <script>
        document.querySelector('[data-bs-target="#exampleModal"]').addEventListener('click', function() {
            const tenggatPengerjaanValue = document.getElementById('tenggat_pengerjaan').value;
            document.querySelector('#exampleModal input[name="tenggat_pengerjaan"]').value = tenggatPengerjaanValue;
        });
    </script>
</body>
</html>
