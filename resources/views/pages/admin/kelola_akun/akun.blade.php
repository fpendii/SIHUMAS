@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $page }} Pegawai</h3>
                    <p class="text-subtitle text-muted">Data akun yang pegawai yang sudah terdaftar</p>
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
                <div class="card-header">
                    <h5 class="card-title text-start ">
                        Data Tabel Akun Pegawai
                    </h5>
                    <a href="{{ url('admin/kelola_akun/tambah') }}" class="btn btn-sm btn-success">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pegawai as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nomer_hp }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>Tes</td>
                                <td class="col-2">
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div
@endsection
