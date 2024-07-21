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
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title"></i>{{ $dataPermohonan->username }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $dataPermohonan->pesan }}</p>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Data Permohonan</h4>
                                <form action="{{ url('admin/peliputan/pilih-petugas/' . $dataPermohonan->id_pesanan) }}">
                                @csrf
                                @method('PUT')     
                                                 
                                <div class="form-body">
                                    {{-- <div class="row"> --}}
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
                                <div class="form-group">
                                    <div class="row mt-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="feedback4">File Pendukung</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="feedback4" class="form-control" value="{{ $dataPermohonan->link_mentahan }}" name="LastName" readonly>
                                            <a href="{{ $dataPermohonan->link_mentahan }}" target="_blank" class="btn btn-primary btn-sm mt-2">Open Link</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-actions d-flex justify-content-end gap-1">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        ACC
                                    </button>
                                </form>
                                    <form action="{{ url('admin/peliputan/tolak/' . $dataPermohonan->id_pesanan) }}"
                                        method="post" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger me-1">Tolak</button>
                                    </form>
                                    <a href="{{ url('admin/peliputan') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/peliputan/pilih-petugas/'. $dataPermohonan->id_pesanan) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pilih Petugas Yang Mengerjakan</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0 d-flex flex-column">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($dataPetugas as $item)
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <input name="petugas[]"
                                                            value="{{ $item->id_akun }}"
                                                            type="checkbox"
                                                            id="checkbox{{ $i }}"
                                                            class="form-check-input" checked>
                                                        <label
                                                            for="checkbox{{ $i }}">{{ $item->username }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @php
                                                $i++;
                                            @endphp
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

    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>
</html>