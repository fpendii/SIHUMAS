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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
                                            <label for="first-name-horizontal">Tipe Desain</label>
                                        </div>
                                        <div class="col-md-8 form-group">

                                            <fieldset class="form-group">
                                                <select name="tipe_desain"
                                                    class="form-select @error('tipe_desain') is-invalid @enderror"
                                                    id="basicSelect">
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
                                            <label for="password-horizontal">Pesan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email-horizontal">Ukuran Gambar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-horizontal"
                                                class="form-control @error('ukuran_gambar') is-invalid @enderror"
                                                name="ukuran_gambar" placeholder="Ukuran Gambar...">
                                            @error('ukuran_gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact-info-horizontal">Mentahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="contact-info-horizontal" class="form-control"
                                                name="link_mentahan" placeholder="Masukkan link mentahan">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact-info-horizontal">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="contact-info-horizontal" class="form-control"
                                                name="tenggat_waktu">
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
