@extends('layout.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tugas Terbaru</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>

            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-dangert alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($petugas_pesanan->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning">
                            No data available.
                        </div>
                    </div>
                @else
                    @foreach ($petugas_pesanan as $item)
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    {{ $item->jenis_jasa }}
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>{{ $item->pesan }}</p>
                                        <footer class="blockquote-footer">
                                            @if ($item->jenis_jasa == 'pas_foto')
                                                Tanggal Pengambilan Foto
                                                <p>{{ \Carbon\Carbon::parse($item->jadwal_foto)->format(' d/m/Y H:i:s') }}</p>
                                                {{-- <p>{{ $item->jadwal_foto }}</p> --}}
                                            @else
                                                Batas Waktu
                                                <p>{{ $item->tenggat_pengerjaan }}</p>
                                            @endif
                                        </footer>
                                    </blockquote>
                                </div>
                                <a href="tugas/{{ $item->jenis_jasa }}/detail-tugas/{{ $item->id_pesanan }}"
                                    class="btn btn-primary block">Kerjakan</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    @endsection
