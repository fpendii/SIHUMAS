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
                            <form action="{{ url('jasa/liputan/submit') }}" method="POST" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="jadwal-mulai">Jadwal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="jadwal-mulai" class="form-control"
                                                name="jadwal_mulai">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jadwal-selesai">Jadwal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="jadwal-selesai" class="form-control"
                                                name="jadwal_selesai">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="link-mentahan">Mentahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="link-mentahan"
                                                class="form-control @error('link_mentahan') is-invalid @enderror"
                                                name="link_mentahan" placeholder="Masukkan link mentahan">
                                            @error('link_mentahan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="link-hasil">Link Hasil</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="link-hasil"
                                                class="form-control @error('link_hasil') is-invalid @enderror"
                                                name="link_hasil" placeholder="Masukkan link hasil">
                                            @error('link_hasil')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" class="form-control" id="keterangan" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tenggat-pengerjaan">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tenggat-pengerjaan" class="form-control"
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
