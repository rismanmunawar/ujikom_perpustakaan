<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;

use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Koleksi";
        $koleksis = Koleksi::All();
        return view('koleksis/index', compact('koleksis', 'title', 'nm_pengguna'));
    }
    public function create()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Koleksi";
        $lastKode = Koleksi::orderBy('kd_koleksi', 'desc')->first();
        $nextKode = 'KK001'; // Default kode jika tidak ada data koleksi

        // Jika ada kode sebelumnya, buat kode berikutnya
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_koleksi, 2)); // Ambil angka dari kode sebelumnya
            $nextNumber = $lastNumber + 1; // Tambahkan 1 ke angka tersebut
            $nextKode = 'KK' . sprintf('%03d', $nextNumber); // Format ulang kode
        }

        return view('koleksis/create', compact('title', 'nm_pengguna', 'nextKode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'cetakan' => 'required',
            'edisi' => 'required',
            'status' => 'required|in:Tersedia,Dipinjam',
        ]);

        // Dapatkan kode koleksi terakhir dari database
        $lastKode = Koleksi::orderBy('kd_koleksi', 'desc')->first();

        // Default kode jika tidak ada data koleksi
        $nextKode = 'KK001';

        // Jika ada kode sebelumnya, buat kode berikutnya
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_koleksi, 2)); // Ambil angka dari kode sebelumnya
            $nextNumber = $lastNumber + 1; // Tambahkan 1 ke angka tersebut
            $nextKode = 'KK' . sprintf('%03d', $nextNumber); // Format ulang kode
        }

        // Tambahkan kode koleksi ke dalam data request
        $request->merge(['kd_koleksi' => $nextKode]);

        // Proses penyimpanan data jika validasi berhasil
        Koleksi::create($request->all());

        return redirect()->route('koleksis.index')
            ->with('success', 'Koleksi created successfully.');
    }

    public function edit($id)
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Koleksi";
        $koleksi = Koleksi::find($id);
        return view('koleksis.edit', compact('koleksi', 'title', 'nm_pengguna'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'cetakan' => 'required',
            'edisi' => 'required',
            'status' => 'required|in:Tersedia,Dipinjam',
        ]);
        $koleksi = Koleksi::find($id);
        $koleksi->update($request->all());
        return redirect()->route('koleksis.index')->withSuccess('Koleksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $koleksi = Koleksi::find($id);
        $koleksi->delete();
        return redirect()->route('koleksis.index')->withSuccess('Koleksi berhasil dihapus');
    }
}
