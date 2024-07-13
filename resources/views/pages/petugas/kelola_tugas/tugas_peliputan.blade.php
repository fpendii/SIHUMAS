 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">

    <script>
        function ubahNilaiPertanyaan() {
            var pertanyaanIds = ['pertanyaan_1', 'pertanyaan_2', 'pertanyaan_3'];
            pertanyaanIds.forEach(function(id) {
                var pertanyaanInput = document.getElementById(id);
                var nilai = pertanyaanInput.value;
                if (nilai === '1') {
                    pertanyaanInput.value = 'Iya';
                } else if (nilai === '0') {
                    pertanyaanInput.value = 'Tidak';
                }
            });
        }
    </script>
</head>
<body onload="ubahNilaiPertanyaan()">
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url('petugas/tugas') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="/template/dist/assets/compiled/svg/logo.svg">
            </a>
        </div>
    </nav>

    <div class="container">
        {{-- <form action="{{ url('petugas/tugas/' . $page . '/submit/' . $dataPermohonan->id_pesanan) }}"> --}}
            <form action="{{ url('petugas/tugas/' . $page . '/submit/' . $dataPermohonan->id_pesanan) }}" method="POST">
                @csrf
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Link Hasil tugas {{ $dataPermohonan->jenis_jasa }}</h4>
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
                        <div class="card-body">
                            <h4 class="card-title">Data Permohonan</h4>
                            <label for="feedback1" class="sr-only">Petugas Yang Mengerjakan</label>
                                <div class="list-group">
                                    @foreach ($dataPetugasPesanan as $item)
                                        <span class="list-group-item">
                                            {{ $item->username }}
                                        </span>
                                    @endforeach
                                    <br>
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
                                                <label for="feedback1">Jadwal Mulai</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="feedback1" class="form-control" value="{{ $dataPermohonan->waktu_mulai }}" name="name" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="feedback1">Jadwal Selesai</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="feedback1" class="form-control" value="{{ $dataPermohonan->waktu_selesai }}" name="name" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="feedback2">Apakah kegiatan membutuhkan keprotokolan dalam kegiatan tersebut?
                                                    <br>(jika keprotokolan kegiatan cukup di handle oleh pelaksana kegiatan, maka pilih "Tidak")
                                                </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="feedback2" class="form-control" value="{{ $dataPermohonan->pertanyaan_1 == 1 ? 'Ya' : 'Tidak' }}" name="pertanyaan_1" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="feedback2">Apakah kegiatan membutuhkan dokumentasi foto?
                                                    <br>(foto-foto kegiatan akan mewakili setiap momen penting di dalam kegiatan tersebut)
                                                </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="feedback2" class="form-control" value="{{ $dataPermohonan->pertanyaan_2 == 1 ? 'Ya' : 'Tidak' }}" name="pertanyaan_2" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="feedback2">Apakah kegiatan membutuhkan bantuan Unit Humas untuk pembuatan sertifikat?
                                                    <br>(Jika "Ya" silakan mengisi kembali link permohonan editing)
                                                </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="feedback2" class="form-control" value="{{ $dataPermohonan->pertanyaan_3 == 1 ? 'Ya' : 'Tidak' }}" name="pertanyaan_3" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                            <div class="form-actions d-flex justify-content-end grid gap-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/petugas/tugas" class="btn btn-secondary">Kembali</a>
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

