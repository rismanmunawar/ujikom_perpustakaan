<?php

namespace App\Http\Controllers;

use App\Models\PinjamModel;
use App\Models\Anggota;
use App\Models\KembaliModel;
use App\Models\Koleksi;
use Illuminate\Http\Request;

class KembaliController extends Controller
{
    public function index()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Pengembalian";
        $kembalis = KembaliModel::all();
        return view('pengembalian/index', compact('title', 'kembalis', 'nm_pengguna'));
    }
    public function create()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Koleksi";
        $anggotas = Anggota::all();
        $koleksis = Koleksi::all();
        $pinjams = PinjamModel::all();
        $lastKode = KembaliModel::orderBy('no_transaksi_pinjam', 'desc')->first();
        $nextKode = 'TRK001';

        // Jika ada kode sebelumnya, buat kode berikutnya
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_koleksi, 2));
            $nextNumber = $lastNumber + 1; // Tambahkan 1 ke angka 
            $nextKode = 'TRK' . sprintf('%03d', $nextNumber); // Format ulang kode
        }
        return view('pengembalian/create', compact('title', 'nextKode', 'anggotas', 'koleksis', 'pinjams', 'nm_pengguna'));
    }

    public function store(Request $request)
    {
        $id_pengguna = $request->user()->id;
        $request->merge(['id_pengguna' => $id_pengguna]);
        $request->validate([
            'no_transaksi_pinjam' => 'required',
            'no_transaksi_kembali' => 'required',
            'kd_anggota' => 'required',
            'tg_pinjam' => 'required',
            'tg_kembali' => 'required',
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'denda' => 'required',
            'ket' => 'required',
            'id_pengguna' => 'required',
        ]);
        $lastKode = KembaliModel::orderBy('no_transaksi_kembali', 'desc')->first();
        $nextKode = 'TRK001';
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->no_transaksi_kembali, 3));
            $nextNumber = $lastNumber + 1;
            $nextKode = 'TRK' . sprintf('%03d', $nextNumber);
        }
        $request->merge(['no_transaksi_kembali' => $nextKode]);
        KembaliModel::create($request->all());
        return redirect()->route('kembalis.index')
            ->with('success', 'Pengembalian created successfully.');
    }
    public function edit($id)
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Pengembalian";
        $koleksis = Koleksi::all();
        $anggotas = Anggota::all();
        $pinjams = PinjamModel::all();
        $kembalis = KembaliModel::find($id);
        return view('pengembalian.edit', compact('pinjams', 'kembalis', 'anggotas', 'koleksis', 'title', 'nm_pengguna'));
    }

    public function update(Request $request, $id)
    {
        $id_pengguna = $request->user()->id;
        $request->merge(['id_pengguna' => $id_pengguna]);
        $request->validate([
            'no_transaksi_pinjam' => 'required',
            'no_transaksi_kembali' => 'required',
            'kd_anggota' => 'required',
            'tg_pinjam' => 'required',
            'tg_kembali' => 'required',
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'denda' => 'required',
            'ket' => 'required',
            'id_pengguna' => 'required',
        ]);
        $kembalis = KembaliModel::find($id);
        $kembalis->update($request->all());
        return redirect()->route('kembalis.index')->with('success', 'Pengembalian berhasil diperbarui');
    }
    public function destroy($id)
    {
        $kembalis = KembaliModel::find($id);
        $kembalis->delete();
        return redirect()->route('kembalis.index')->withSuccess('Pengembalian berhasil dihapus');
    }
}
