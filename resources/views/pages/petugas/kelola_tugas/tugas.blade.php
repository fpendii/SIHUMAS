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
                @for ($i = 0; $i < 5; $i++)
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                Desain
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Buatkan desain spanduk untuk diesnatalis</p>
                                    <footer class="blockquote-footer">
                                        Batas Waktu
                                        <p>21-02-2023</p>
                                    </footer>
                                </blockquote>
                            </div>
                            <button type="button" class="btn btn-primary">Kerjakan</button>
                        </div>
                    </div>
                @endfor
        </section>
    @endsection
