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
                                            <label for="tipe">Tipe Desain</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select name="tipe_desain"
                                                    class="form-select @error('tipe_desain') is-invalid @enderror"
                                                    id="tipe">
                                                    <option value=""> --- Pilih Tipe Desain --- </option>
                                                    <option value="poster">Poster</option>
                                                    <option value="spanduk">Spanduk</option>
                                                </select>
                                                @error('tipe_desain')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tema">Tema Desain</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input name="tema" class="form-control" id="tema" rows="3"></input>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pesan">Pesan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" class="form-control" id="pesan" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ukuran_gambar">Ukuran Gambar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="ukuran_gambar"
                                                class="form-control @error('ukuran_gambar') is-invalid @enderror"
                                                name="ukuran_gambar" placeholder="Ukuran Gambar...">
                                            @error('ukuran_gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mentahan">Mentahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="mentahan"
                                                class="form-control @error('link_mentahan') is-invalid @enderror"
                                                name="link_mentahan" placeholder="Masukkan link mentahan">
                                            @error('ukuran_gambar')
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
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
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
