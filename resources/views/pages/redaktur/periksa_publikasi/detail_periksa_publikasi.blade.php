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
            <a href="{{ url('redaktur/tugas') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="/template/dist/assets/compiled/svg/logo.svg">
            </a>
        </div>
    </nav>

    <div class="container">
        <form action="{{ url('redaktur/tugas/' . $page . '/submit/' . $dataPermohonan->id_pesanan) }}" method="POST">
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
                            <h4 class="card-title">Data Permohonan {{ $dataPermohonan->jenis_jasa }}</h4>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="feedback1" class="sr-only">Petugas Yang Mengerjakan</label>
                                    <div class="list-group">
                                        @foreach ($dataPetugasPesanan as $item)
                                            <span class="list-group-item">
                                                {{ $item->username }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feedback1" class="sr-only">Pilihan Publikasi</label>
                                    <input type="text" id="feedback1" class="form-control"
                                        value="{{ $dataPermohonan->pilihan_publikasi ?? 'N/A' }}" placeholder="Name"
                                        name="pilihan_publikasi" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="feedback1" class="sr-only">Catatan Redaktur</label>
                                    <input type="text" id="feedback1" class="form-control @error('catatan_redaktur') is-invalid @enderror"
                                        value="{{ old('catatan_redaktur', $dataPermohonan->catatan_redaktur) }}" 
                                        name="catatan_redaktur">
                                    @error('catatan_redaktur')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feedback4" class="sr-only">Link Ringkasan Publikasi</label>
                                    <a href="{{ url('publikasi/' . $dataPermohonan->link_ringkasan_publikasi) }}" target="_blank">{{ $dataPermohonan->link_ringkasan_publikasi }}</a>
                                </div>
                                <div class="form-group">
                                    <label for="link_mentahan" class="sr-only">Link Mentahan</label>
                                    <input type="text" id="link_mentahan" class="form-control" 
                                           value="{{ $dataPermohonan->link_mentahan }}" 
                                           readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="feedback2" class="sr-only">Tag Sosmed</label>
                                    <input type="text" id="feedback2" class="form-control"
                                        value="{{ $dataPermohonan->tag_sosmed }}" name="tag_sosmed" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="feedback2" class="sr-only">Tenggat Pengerjaan</label>
                                    <input type="text" id="feedback2" class="form-control"
                                        value="{{ $dataPermohonan->tenggat_pengerjaan }}" name="tenggat_pengerjaan"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-actions d-flex justify-content-end grid gap-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/redaktur/tugas" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="/template/dist/assets/compiled/js/app.js"></script>

    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                            "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                .valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
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
