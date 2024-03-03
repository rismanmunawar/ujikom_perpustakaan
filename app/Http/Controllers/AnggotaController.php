<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Anggota";
        $anggotas = Anggota::All();
        return view('anggota/index', compact('anggotas', 'title', 'nm_pengguna'));
    }
    public function create()
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Anggota";
        $lastKode = Anggota::orderBy('kd_anggota', 'desc')->first();
        $nextKode = 'KA001';
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_anggota, 2));
            $nextNumber = $lastNumber + 1;
            $nextKode = 'KA' . sprintf('%03d', $nextNumber);
        }

        return view('anggota/create', compact('title', 'nextKode', 'nm_pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_anggota' => 'required',
            'jk' => 'required',
            'tp_lahir' => 'required',
            'tg_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jns_anggota' => 'required',
            'jml_pjm' => 'required',
        ]);

        $lastKode = Anggota::orderBy('kd_anggota', 'desc')->first();
        $nextKode = 'KA001';
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kd_anggota, 2)); // Ambil angka dari kode sebelumnya
            $nextNumber = $lastNumber + 1; // Tambahkan 1 ke angka tersebut
            $nextKode = 'KA' . sprintf('%03d', $nextNumber); // Format ulang kode
        }
        // Tambahkan kode anggota ke dalam data request
        $request->merge(['kd_anggota' => $nextKode]);
        // Proses penyimpanan data jika validasi berhasil
        Anggota::create($request->all());

        return redirect()->route('anggotas.index')
            ->with('success', 'Anggota created successfully.');
    }

    public function edit($id)
    {
        $nm_pengguna = $this->currentUser->nm_pengguna;
        $title = "Anggota";
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota', 'title', 'nm_pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kd_anggota' => 'required',
            'nm_anggota' => 'required',
            'jk' => 'required',
            'tp_lahir' => 'required',
            'tg_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jns_anggota' => 'required',
            'status' => 'required',
        ]);
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        return redirect()->route('anggotas.index')->withSuccess('Anggota berhasil diperbarui');
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return redirect()->route('anggotas.index')->withSuccess('Anggota berhasil dihapus');
    }
}
