@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Validation</h3>
                    <p class="text-subtitle text-muted">
                        Complete the form with powerful validation library such as Parsley.
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Validation
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Parsley</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ url('admin/kelola_akun/simpan') }}" method="POST"
                                    data-parsley-validate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="first-name-column" class="form-label">Nama</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="Masukkan nama" name="nama"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="first-name-column" class="form-label">Nomer Handphone</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="Masukkan no handphone" name="nomer_hp"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Tambah
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Kembali
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
