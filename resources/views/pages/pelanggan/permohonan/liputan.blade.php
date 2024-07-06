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
                                            <label for="password-horizontal">Pesan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="pesan" placeholder="Masukkan pesan permohonan" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="jadwal-mulai">Jadwal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="datetime-local" id="jadwal-mulai" class="form-control" name="waktu_mulai">
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <label for="jadwal-selesai">Jadwal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="jadwal-selesai" class="form-control" name="waktu_selesai">
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label for="jadwal-selesai">Jadwal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="datetime-local" id="jadwal-selesai" class="form-control" name="waktu_selesai">
                                        </div>
                                        
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="dokumentasi-foto-1">
                                                        Apakah kegiatan membutuhkan keprotokolan dalam kegiatan tersebut? 
                                                        <br>(jika keprotokolan kegiatan cukup di handle oleh pelaksana kegiatan, maka pilih "Tidak")
                                                    </label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_1" id="dokumentasi_foto_1_ya" value="1" required>
                                                        <label class="form-check-label" for="dokumentasi_foto_1_ya">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_1" id="dokumentasi_foto_1_tidak" value="0" checked required>
                                                        <label class="form-check-label" for="dokumentasi_foto_1_tidak">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label for="dokumentasi-foto-2">
                                                        Apakah kegiatan membutuhkan dokumentasi foto?
                                                        <br>(foto-foto kegiatan akan mewakili setiap momen penting di dalam kegiatan tersebut)
                                                    </label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_2" id="dokumentasi_foto_2_ya" value="1" required>
                                                        <label class="form-check-label" for="dokumentasi_foto_2_ya">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_2" id="dokumentasi_foto_2_tidak" value="0" checked required>
                                                        <label class="form-check-label" for="dokumentasi_foto_2_tidak">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label for="dokumentasi-foto-3">
                                                        Apakah kegiatan membutuhkan bantuan Unit Humas untuk pembuatan sertifikat?
                                                        <br>(Jika "Ya" silakan mengisi kembali link permohonan editing)
                                                    </label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_3" id="dokumentasi_foto_3_ya" value="1" required>
                                                        <label class="form-check-label" for="dokumentasi_foto_3_ya">
                                                            Ya (sertifikat narasumber)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_3" id="dokumentasi_foto_3_ya" value="1" required>
                                                        <label class="form-check-label" for="dokumentasi_foto_3_ya">
                                                            Ya (sertifikat narasumber & peserta)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pertanyaan_3" id="dokumentasi_foto_3_tidak" value="0" checked required>
                                                        <label class="form-check-label" for="dokumentasi_foto_3_tidak">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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
   
@endsection
