<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasModel;
use App\Models\akun;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index(Request $request)
    {
        // Data tambahan untuk view
        $data = [
            'title' => 'Kelola Akun | LinePro',
            'page' => 'Kelola Akun',
            'level' => 'Admin',
        ];

        // Mengambil parameter role dari request
        $role = $request->input('role');

        // Jika ada filter role, tambahkan kondisi pada kueri
        if ($role) {
            $data_pegawai = DB::table('akun')
                ->where('role', $role)
                ->whereNot('is_active', 0)
                ->orderBy('id_akun', 'desc')
                ->get();
        } else {
            $data_pegawai = DB::table('akun')
                ->orderBy('id_akun', 'desc')
                ->whereNot('is_active', 0)
                ->get();
        }

        return view('pages.admin.kelola_akun.akun', compact('data_pegawai'), $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Akun | LinePro',
            'page' => 'Kelola Akun',
            'level' => 'Admin'
        ];

        return view('pages.admin.kelola_akun.form_tambah', $data);
    }

    public function simpan(Request $request)
    {
        // Definisikan aturan validasi
        $rules = [
            'username' => 'required|string|max:255|unique:akun,username',
            'email' => 'required|string|email|max:255|unique:akun,email',
            'no_hp' => 'required|string|max:15',
            'level' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'nama' => 'required|string|max:255'
        ];

        // Pesan kesalahan kustom (opsional)
        $messages = [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'no_hp.required' => 'No handphone wajib diisi',
            'level.required' => 'Jabatan wajib dipilih'
        ];

        // Lakukan validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan transaksi database
        DB::transaction(function () use ($request) {
            $password = bcrypt($request->password);

            $id_akun = DB::table('akun')->insertGetId([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'role' => $request->level,
                'password' => $password,
                'is_active' => true,
                'nama' => $request->nama,
                'email_verified_at' => now()
            ]);
        });

        return redirect()->to('admin/kelola-akun')->with('success', 'Data ' . $request->nama . ' Berhasil Ditambah');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Kelola Akun | LinePro',
            'page' => 'Kelola Akun',
            'level' => 'Admin',
        ];
        // Dapatkan data akun dan petugas berdasarkan ID
        $akun = DB::table('akun')->where('id_akun', $id)->first();

        // Periksa apakah data ditemukan
        if (!$akun) {
            return redirect()->to('admin/kelola-akun')->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit dengan data yang ditemukan
        return view('pages.admin.kelola_akun.form_edit', $data, compact('akun'));
    }

    public function update(Request $request, $id)
    {
        // Definisikan aturan validasi
        $rules = [
            'username' => 'required|string|max:255|unique:akun,username,' . $id . ',id_akun',
            'email' => 'required|string|email|max:255|unique:akun,email,' . $id . ',id_akun',
            'no_hp' => 'required|string|max:15',
            'level' => 'required|string',
            'nama' => 'required|string|max:255'
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'sometimes|string|min:8|confirmed';
            $rules['password_confirmation'] = 'sometimes|string|min:8';
        }

        // Pesan kesalahan kustom (opsional)
        $messages = [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'nama.required' => 'Nama wajib diisi',
            'no_hp.required' => 'No handphone wajib diisi',
            'level.required' => 'Jabatan wajib dipilih'
        ];

        // Lakukan validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan transaksi database
        DB::transaction(function () use ($request, $id) {
            $dataAkun = [
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'role' => $request->level,
                'is_active' => true,
                'nama' => $request->nama,
            ];

            if ($request->filled('password')) {
                $dataAkun['password'] = bcrypt($request->password);
            }

            DB::table('akun')->where('id_akun', $id)->update($dataAkun);
        });

        // Set flash session untuk notifikasi berhasil
        return redirect()->to('admin/kelola-akun')->with('success', 'Data berhasil diperbarui');
    }

    public function hapus($id)
    {
        $akun = DB::table('akun')->where('id_akun', $id)->first();

        if ($akun) {
            DB::table('akun')->where('id_akun', $id)->update(['is_active' => 0]);
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
