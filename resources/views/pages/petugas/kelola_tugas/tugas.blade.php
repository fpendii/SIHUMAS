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
                            <a href="tugas/{{$item->jenis_jasa}}/detail-tugas/{{$item->id_pesanan}}" class="btn btn-primary block" >Kerjakan</a>
                        </div>
                    </div>
                @endforeach

        </section>
    @endsection
