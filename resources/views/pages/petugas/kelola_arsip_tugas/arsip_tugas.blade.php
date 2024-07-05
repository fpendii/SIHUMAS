@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $page }}</h3>
                    <p class="text-subtitle text-muted">Arsip tugas yang pernah dikerjakan</p>
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
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($ArsipTugas as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td class="col-4">{{$item->jenis_jasa}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td class="col-2">
                                        @if ($item->status == 'selesai')
                                            <span class="badge bg-success">{{$item->status}}</span>
                                        @else
                                        <span class="badge bg-danger">{{$item->status}}</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
