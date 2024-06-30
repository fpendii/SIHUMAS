@extends('layout.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Tambah Akun</h3>
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

        <!-- Tampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ url('admin/kelola-akun/simpan') }}" method="POST"
                                    data-parsley-validate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control"
                                                    placeholder="Masukkan nama" name="nama"
                                                    data-parsley-required="true" value="{{ old('nama') }}" />
                                                @error('nama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" id="username" class="form-control"
                                                    placeholder="Masukkan Username" name="username"
                                                    data-parsley-required="true" value="{{ old('username') }}" />
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" id="email" class="form-control"
                                                    placeholder="Masukkan Alamat Email" name="email"
                                                    data-parsley-required="true" value="{{ old('email') }}" />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="no_hp" class="form-label">No Handphone</label>
                                                <input type="text" id="no_hp" class="form-control"
                                                    placeholder="Masukkan no handphone" name="no_hp"
                                                    data-parsley-required="true" value="{{ old('no_hp') }}" />
                                                @error('no_hp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" id="password" class="form-control"
                                                    placeholder="Masukkan password" name="password"
                                                    data-parsley-required="true" />
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                                <input type="password" id="password_confirmation" class="form-control"
                                                    placeholder="Masukkan konfirmasi password" name="password_confirmation"
                                                    data-parsley-required="true" />
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <fieldset class="form-group">
                                                <select name="level" class="form-select" id="jabatan"
                                                    data-parsley-required="true">
                                                    <option value="">--- Pilih Jabatan ---</option>
                                                    <option value="koordinator" {{ old('level') == 'koordinator' ? 'selected' : '' }}>Koordinator</option>
                                                    <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                    <option value="redaktur" {{ old('level') == 'redaktur' ? 'selected' : '' }}>Redaktur</option>
                                                    <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>

                                                </select>
                                                @error('level')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
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
