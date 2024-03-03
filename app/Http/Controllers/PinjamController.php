<?php

namespace App\Http\Controllers;

use App\Models\PinjamModel;
use App\Models\Anggota;
use App\Models\Koleksi;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna; //Ini ngambil dri basecontroller
        $title = "Pengembalian";
        $pinjams = PinjamModel::all();
        return view('peminjaman.index', compact('pinjams', 'title', 'nm_pengguna'));
    }
    public function create()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Koleksi";
        $anggotas = Anggota::all();
        $koleksis = Koleksi::all();
        $lastKode = PinjamModel::orderBy('no_transaksi_pinjam', 'desc')->first();
        $nextKode = 'TRP001';

        // Jika ada kode sebelumnya, buat kode berikutnya
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_koleksi, 2));
            $nextNumber = $lastNumber + 1; // Tambahkan 1 ke angka 
            $nextKode = 'TRP' . sprintf('%03d', $nextNumber); // Format ulang kode
        }
        return view('peminjaman/create', compact('title', 'nextKode', 'anggotas', 'koleksis', 'nm_pengguna'));
    }

    public function store(Request $request)
    {
        $id_pengguna = $request->user()->id;
        $request->merge(['id_pengguna' => $id_pengguna]);
        $request->validate([
            'no_transaksi_pinjam' => 'required',
            'kd_anggota' => 'required',
            'nm_anggota' => 'required',
            'tg_pinjam' => 'required',
            'tg_bts_kembali' => 'required',
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
        ]);
        $lastKode = PinjamModel::orderBy('no_transaksi_pinjam', 'desc')->first();
        $nextKode = 'TRP001';
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->no_transaksi_pinjam, 3));
            $nextNumber = $lastNumber + 1;
            $nextKode = 'TRP' . sprintf('%03d', $nextNumber);
        }
        $request->merge(['no_transaksi_pinjam' => $nextKode]);
        PinjamModel::create($request->all());
        return redirect()->route('pinjams.index')
            ->with('success', 'Peminjaman created successfully.');
    }


    public function edit($id)
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Peminjaman";
        $pinjams = PinjamModel::find($id);
        $koleksis = Koleksi::all();
        $anggotas = Anggota::all();
        return view('peminjaman.edit', compact('pinjams', 'anggotas', 'koleksis', 'title', 'nm_pengguna'));
    }
    public function update(Request $request, $id)
    {
        $id_pengguna = $request->user()->id;
        $request->merge(['id_pengguna' => $id_pengguna]);
        $request->validate([
            'no_transaksi_pinjam' => 'required',
            'kd_anggota' => 'required',
            'nm_anggota' => 'required',
            'tg_pinjam' => 'required',
            'tg_bts_kembali' => 'required',
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
        ]);
        $pinjam = PinjamModel::find($id);
        $pinjam->update($request->all());
        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pinjam = PinjamModel::find($id);
        $pinjam->delete();
        return redirect()->route('pinjams.index')->withSuccess('Peminjaman berhasil dihapus');
    }
}
