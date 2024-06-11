@extends('layout.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tugas Terbaru</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                @foreach ($petugas_pesanan as $item)
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                {{$item->jenis_jasa}}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{$item->pesan}}</p>
                                    <footer class="blockquote-footer">
                                        Batas Waktu
                                        <p>{{$item->tenggat_pengerjaan}}</p>
                                    </footer>
                                </blockquote>
                            </div>
                            <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                            data-bs-target="#default">Kerjakan</button>
                            <div class="card">
                                <div class="card-body">
                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="basicInput">Link Hasil</label>
                                                        <input type="text" class="form-control" id="basicInput" placeholder="Masukkan Link Hasil">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Kirim</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

        </section>
    @endsection
