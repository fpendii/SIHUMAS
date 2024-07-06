@extends('layout.main')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Edit Akun</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Edit Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ url('admin/kelola-akun/update', $akun->id_akun) }}" method="POST"
                                data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" id="nama" class="form-control"
                                                placeholder="Masukkan nama" name="nama"
                                                data-parsley-required="true" value="{{ old('nama', $akun->nama) }}" />
                                            @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
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
                                                data-parsley-required="true" value="{{ old('username', $akun->username) }}" />
                                            @error('username')
                                            <div class="text-danger">{{ $message }}</div>
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
                                                data-parsley-required="true" value="{{ old('email', $akun->email) }}" />
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
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
                                                data-parsley-required="true" value="{{ old('no_hp', $akun->no_hp) }}" />
                                            @error('no_hp')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Masukkan password baru (kosongkan jika tidak ingin mengubah)"
                                                name="password" />
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                            <input type="password" id="password_confirmation" class="form-control"
                                                placeholder="Masukkan konfirmasi password" name="password_confirmation" />
                                            @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <fieldset class="form-group">
                                            <select name="level" class="form-select" id="jabatan">
                                                <option value="koordinator" {{ $akun->role == 'koordinator' ? 'selected' : '' }}>Koordinator</option>
                                                <option value="petugas" {{ $akun->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                <option value="redaktur" {{ $akun->role == 'redaktur' ? 'selected' : '' }}>Redaktur</option>
                                                <option value="admin" {{ $akun->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </fieldset>
                                        @error('level')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Update
                                        </button>
                                        <a href="{{url('admin/kelola-akun')}}" class="btn btn-light-secondary me-1 mb-1">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
