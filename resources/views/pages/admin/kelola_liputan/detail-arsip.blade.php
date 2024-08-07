<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>


    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
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
                <h4 class="card-title">{{ $dataPermohonan->username }}</h4>
                <div class="form-group">
                    <label for="linkMentahan" class="sr-only">Link Hasil</label>
                    <input type="text" id="linkMentahan" class="form-control"
                        value="{{ $dataPermohonan->link_hasil }}" readonly>
                    <small><a href="{{ $dataPermohonan->link_hasil }}" target="_blank" id="linkMentahanHref">Klik di sini untuk membuka link Hasilnya</a></small>
                </div>
            </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Data Permohonan</h4>
                                <div class="card-body">
                                    <p>{{ $dataPermohonan->pesan }}</p>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="feedback1" class="sr-only">Petugas Yang Mengerjakan</label>
                                        <div class="list-group">
                                                @foreach ( $dataPetugasPesanan as $item)
                                                    <span class="list-group-item">{{ $item->username }}</span>
                                                @endforeach
                                            
                                        </div>
                                    </div>

                        {{-- <div class="form-body"> --}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="unit" class="sr-only">Unit</label>
                                    <input type="text" id="unit" class="form-control"
                                        value="{{ $dataPermohonan->unit }}" name="unit" readonly>
                                </div>
                                <div class="row">
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
                            {{-- <div class="form-group">
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
                            </div> --}}
                            <div class="form-group">
                                <div class="row mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="feedback4">Undangan Kegiatan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="feedback4" class="form-control" placeholder="{{ $dataPermohonan->undangan_kegiatan}}" name="LastName" readonly>
                                        <a href="{{ $dataPermohonan->undangan_kegiatan }}" target="_blank" class="btn btn-primary btn-sm mt-2">Open Link</a>
                                    </div>
                                </div>
                            </div>
                        <div class="form-actions d-flex justify-content-end grid gap-1">

                            <a href="{{url('admin/peliputan/')}}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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