@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $page }}</h3>
                    <a>Laporan Permohonan</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.laporan.cetakPDF') }}" class="btn btn-primary" target="_blank">Cetak Laporan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Pengaju</th>
                                <th>Status</th>
                                <th>Total</th>
                                {{-- <th>PerMinggu</th>
                                <th>PerBulan</th>
                                <th>PerTahun</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($Laporan as $item)
                                @if ($item->status == 'selesai')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td class="col-4">{{$item->jenis_jasa}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td class="col-2">
                                            <span class="badge bg-success">{{$item->status}}</span>
                                        </td>
                                        <td>{{$item->total}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
