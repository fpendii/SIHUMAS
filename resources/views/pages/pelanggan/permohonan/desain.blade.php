@extends('layout.main_pelanggan')

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukkan data di {{ $page }} untuk melalukan permohonan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ url('jasa/desain/submit') }}" method="POST" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="unit">Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input name="unit" class="form-control" id="unit"
                                                rows="3"></input>
                                            <small id="deskripsi_help"
                                                class="form-text text-muted">Direktorat/Manajemen/Program Studi/Unit
                                                Kerja/Ormawa.</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tipe">Tipe Desain</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select name="tipe_desain"
                                                    class="form-select @error('tipe_desain') is-invalid @enderror"
                                                    id="tipe" onchange="checkTipeDesain()">
                                                    <option value=""> --- Pilih Jenis Desain --- </option>
                                                    <option value="poster">Pamflet/Flayer Kegiatan</option>
                                                    <option value="backdrop">Backdrop/Videotron Kegiatan</option>
                                                    <option value="sertifikat">Sertifikat</option>
                                                    <option value="name_tag">Name Tag</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                @error('tipe_desain')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div id="jenis_desain_lainnya_group" class="col-md-12 form-group d-none">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="lainnya">Jenis Desain Lainnya</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="jenis_desain_lainnya" class="form-control"
                                                        id="jenis_desain_lainnya" placeholder="Jenis desain lainnya...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tema">Tema Desain</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input name="tema" class="form-control" id="tema"
                                                rows="3"></input>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pesan">Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" class="form-control" id="pesan" rows="3"></textarea>
                                            <small id="deskripsi_help" class="form-text text-muted">Deskripsikan secara
                                                singkat mengenai kebutuhan atau detail spesifik untuk desain yang
                                                inginkan.</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ukuran_gambar">Ukuran Gambar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="ukuran_gambar" name="ukuran_gambar"
                                                class="form-select @error('ukuran_gambar') is-invalid @enderror"
                                                onchange="checkUkuranGambar(this)">
                                                <option value=""> --- Pilih Ukuran Gambar --- </option>
                                                <option value="A4">A4 (210 x 297 mm)</option>
                                                <option value="A3">A3 (297 x 420 mm)</option>
                                                <option value="A2">A2 (420 x 594 mm)</option>
                                                <option value="A1">A1 (594 x 841 mm)</option>
                                                <option value="A0">A0 (841 x 1189 mm)</option>
                                                <option value="custom">Lainnya</option>
                                            </select>
                                            @error('ukuran_gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="custom_ukuran_group" class="col-md-8 offset-md-4 form-group d-none">
                                            <input type="text" id="ukuran_gambar_custom" name="ukuran_gambar_costum"
                                                class="form-control" placeholder="Masukkan ukuran custom...">
                                            <small id="custom_ukuran_help" class="form-text text-muted">Jelaskanlah ukuran
                                                design yang diminta. Contoh: Design Sertifikat A4/F4; Design Backdrop
                                                Landscape A4; Design Spanduk 4 x 6; DLL.</small>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="mentahan">File Pendukung</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="mentahan"
                                                class="form-control @error('link_mentahan') is-invalid @enderror"
                                                name="link_mentahan" placeholder="Masukkan link drive file pendukung">
                                            <small id="deskripsi_help" class="form-text text-muted">upload
                                                logo/gambar/file pendukung yang diperlukan dalam design (jika ada).</small>
                                            @error('link_mentahan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tenggat">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tenggat" class="form-control"
                                                name="tenggat_pengerjaan">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <a href="{{ url('jasa') }}"
                                                class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
@endsection

<script>
    function checkTipeDesain() {
        var tipeDesain = document.getElementById('tipe').value;
        var jenisDesainLainnyaGroup = document.getElementById('jenis_desain_lainnya_group');
        var jenisDesainLainnya = document.getElementById('jenis_desain_lainnya');

        if (tipeDesain === 'lainnya') {
            jenisDesainLainnyaGroup.classList.remove('d-none');
            jenisDesainLainnya.name = 'tipe_desain'; // Mengganti name
        } else {
            jenisDesainLainnyaGroup.classList.add('d-none');
            jenisDesainLainnya.name = ''; // Menghapus name
        }
    }

    function checkUkuranGambar(select) {
        var customUkuranGroup = document.getElementById('custom_ukuran_group');
        var customUkuranInput = document.getElementById('ukuran_gambar_custom');

        if (select.value === 'custom') {
            customUkuranGroup.classList.remove('d-none'); // Ganti name untuk ukuran kustom
        } else {
            customUkuranGroup.classList.add('d-none');
        }
    }

</script>
