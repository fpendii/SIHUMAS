@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $page }}</h3>
                    <p class="text-subtitle text-muted">Arsip tugas yang pernah dikerjakan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
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
                                <th>Title</th>
                                <th>Pengaju</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td class="col-4">Desain poster acara diesnatalis</td>
                                    <td>Ferdi Nurrahmah</td>
                                    <td>Poster</td>
                                    <td class="col-1">
                                        <span class="badge bg-success">Selesai</span>
                                    </td>
                                    <td class="col-1">
                                        <a href="#" class="btn btn-info btn-sm">Info</a>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
