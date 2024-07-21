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
                            <form action="{{ url('jasa/editing-video/submit') }}" method="POST" class="form form-horizontal">
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
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" placeholder="Deskripsikan secara singkat mengenai kebutuhan atau detail spesifik untuk apa saja video yang ingin di edit" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                
                                        <div class="col-md-4">
                                            <label for="link_mentahan" class="col-form-label"> Link Mentahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="link_mentahan" class="form-control @error('link_mentahan') is-invalid @enderror" name="link_mentahan" placeholder="Masukkan link mentahan seperti link video, dll yang diperlukan dalam editing video">
                                            @error('tenggat_pengerjaan')
                                            <div class="invalid-feedback">The link mentahan field is required.</div>
                                        @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tenggat_pengerjaan">Tenggat Pengerjaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="datetime-local" id="tenggat_pengerjaan" class="form-control @error('tenggat_pengerjaan') is-invalid @enderror" name="tenggat_pengerjaan" value="{{ old('tenggat_pengerjaan') }}">
                                            @error('tenggat_pengerjaan')
                                                <div class="invalid-feedback">The tenggat pengerjaan field is required.</div>
                                            @enderror
                                        </div>
                                        
                                       
                                            <div class="col-md-4">
                                                <label for="mentahan" >File Pendukung</label>
                                            </div>
                                            
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="mentahan"
                                                    class="form-control @error('link_mentahan') is-invalid @enderror"
                                                    name="link_mentahan" placeholder="Masukkan link drive file pendukung">
                                                <small id="deskripsi_help" class="form-text text-muted">upload
                                                gambar panitia/organisasi/file pendukung sebagai bukti yang jelas .</small>
                                                @error('link_mentahan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-12 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="warningCheckbox" name="warning_checkbox">
                                    <small class="form-check-label" for="warningCheckbox">
                                        Jika permohonan ini tidak sesuai dengan kepentingan Politeknik Negeri Tanah Laut maka pihak humas berhak untuk menolak.
                                    </label>
                                </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <a href="{{url('jasa')}}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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