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
                            <form action="{{ url('jasa/publikasi/submit') }}" method="POST" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="unit">Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input name="unit" class="form-control" id="unit" rows="3"></input>
                                            <small id="deskripsi_help" class="form-text text-muted">Direktorat/Manajemen/Program Studi/Unit Kerja/Ormawa.</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password-horizontal">Deskripsi 5w+1H</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <small id="deskripsi_help" class="form-text text-muted">Deskripsikan informasi lengkap mengenai kegiatan atau acara yang ingin dipublikasikan menggunakan pendekatan 5W+1H (What, Who, Where, When, Why, dan How)</small>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Publikasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select name="pilihan_publikasi" class="form-select @error('pilihan_publikasi') is-invalid @enderror" id="publikasiSelect">
                                                    <option value=""> --- Pilih Publikasi --- </option>
                                                    <option value="web">Web</option>
                                                    <option value="sosial media">Sosial Media</option>
                                                    <option value="media masa">Media Masa</option>
                                                </select>
                                                <small id="deskripsi_help" class="form-text text-muted">Pilih media publikasi yang diinginkan untuk mempublikasikan informasi.</small>
                                                @error('pilihan_publikasi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <!-- Tambahkan div untuk pilihan tambahan Sosial Media -->
                                        <div id="sosialMediaOptions" class="row hidden">
                                            <div class="col-md-4">
                                                <label for="sosial-media-options">Pilih Platform Sosial Media</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <fieldset class="form-group">
                                                    <select name="platform_sosial_media" class="form-select">
                                                        <option value=""> --- Pilih Platform --- </option>
                                                        <option value="ig_story">Ig Story</option>
                                                        <option value="feed_ig">Feed IG</option>
                                                        <option value="reel_instagram">Reel Instagram</option>
                                                        <option value="facebook">Facebook</option>
                                                        <option value="twitter">Twitter</option>
                                                        <option value="tiktok">Tiktok</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <!-- Bagian untuk Tag Sosmed -->
                                        <div id="tagSosmedOptions" class="row hidden">
                                            <div class="col-md-4">
                                                <label for="password-horizontal">Tag Sosmed</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="tag_sosmed" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <small id="deskripsi_help" class="form-text text-muted">Masukkan tag atau mention yang ingin ditambahkan saat mempublikasikan informasi di media sosial. Contoh: @username1, @username2.</small>
                                            </div>
                                        </div>

                                        <!-- Form input lainnya -->
                                        <div class="col-md-4">
                                            <label for="contact-info-horizontal">Link Dokumentasi Publikasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="contact-info-horizontal" class="form-control @error('link_mentahan') is-invalid @enderror" name="link_mentahan" placeholder="Masukkan link dokumentasi">
                                            @error('link_mentahan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact-info-horizontal">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="contact-info-horizontal" class="form-control" name="tenggat_pengerjaan" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <a href="{{ url('jasa') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var publikasiSelect = document.getElementById('publikasiSelect');
            var sosialMediaOptions = document.getElementById('sosialMediaOptions');
            var tagSosmedOptions = document.getElementById('tagSosmedOptions');
            var platformSosialMediaSelect = document.getElementsByName('platform_sosial_media')[0];

            if (publikasiSelect && sosialMediaOptions && tagSosmedOptions && platformSosialMediaSelect) {
                publikasiSelect.addEventListener('change', function() {
                    if (this.value === 'sosial media') {
                        sosialMediaOptions.classList.remove('hidden');
                        tagSosmedOptions.classList.remove('hidden');
                    } else {
                        sosialMediaOptions.classList.add('hidden');
                        tagSosmedOptions.classList.add('hidden');
                        platformSosialMediaSelect.value = ''; // Reset nilai select platform sosial media
                    }
                });
            }
        });
    </script>
@endsection
