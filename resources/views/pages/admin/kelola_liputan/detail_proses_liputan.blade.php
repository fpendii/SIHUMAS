<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="/template/dist/assets/static/js/initTheme.js"></script>
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
                <h4 class="card-title">Data Permohonan</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    @isset($dataPetugasPesanan)
                        <div class="form-group">
                            <label for="feedback1" class="sr-only">Petugas Yang Mengerjakan</label>
                            <div class="list-group">
                                @foreach ($dataPetugasPesanan as $item)
                                <span class="list-group-item">{{ $item->username }}</span>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>Data Petugas Pesanan tidak tersedia.</p>
                    @endisset

                    @isset($dataPermohonan)
                        <div class="form-group">
                            <label for="feedback1" class="sr-only">Waktu Mulai</label>
                            <input type="text" id="feedback1" class="form-control"
                                value="{{ $dataPermohonan->waktu_mulai }}" name="waktu_mulai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="feedback2" class="sr-only">Waktu Selesai</label>
                            <input type="text" id="feedback2" class="form-control"
                                value="{{ $dataPermohonan->waktu_selesai }}" name="waktu_selesai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="feedback2" class="sr-only">Pertanyaan 1</label>
                            <input type="text" id="feedback2" class="form-control"
                                value="{{ $dataPermohonan->pertanyaan_1 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_1"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="feedback2" class="sr-only">Pertanyaan 2</label>
                            <input type="text" id="feedback2" class="form-control"
                                value="{{ $dataPermohonan->pertanyaan_2 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_2"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="feedback2" class="sr-only">Pertanyaan 3</label>
                            <input type="text" id="feedback2" class="form-control"
                                value="{{ $dataPermohonan->pertanyaan_3 == 1 ? 'Iya' : 'Tidak' }}" name="pertanyaan_3"
                                readonly>
                        </div>
                    @else
                        <p>Data Permohonan tidak tersedia.</p>
                    @endisset
                </div>
                <div class="form-actions d-flex justify-content-end grid gap-1">
                    <a href="{{ url('admin/peliputan/proses') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="/template/dist/assets/compiled/js/app.js"></script>

    <!-- Live server script (optional) -->
    <script>
        // Code injected by live-server, can be removed or kept as needed
    </script>
</body>

</html>
