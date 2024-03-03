<?php

namespace App\Http\Controllers;

use App\Models\PinjamModel;
use App\Models\KembaliModel;
use App\Models\Koleksi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function ReportUser()
    {
        $users = User::all();
        // Load PDF view
        $pdf = PDF::loadView('report.users_report', compact('users'));
        // return $pdf->download('users_report.pdf');
        return $pdf->stream('users_report.pdf');
    }

    public function ReportAnggota()
    {
        $anggotas = Anggota::all();

        // Load PDF view
        $pdf = PDF::loadView('report.anggotas_report', compact('anggotas'));
        $pdf->setPaper('F4', 'landscape');
        // Stream PDF untuk ditampilkan sebagai preview
        return $pdf->stream('anggotas_report.pdf');
    }

    public function ReportKoleksi()
    {
        $koleksis = Koleksi::all();
        // Load PDF view
        $pdf = PDF::loadView('report.koleksis_report', compact('koleksis'));
        $pdf->setPaper('F4', 'landscape');
        // return $pdf->download('users_report.pdf');
        return $pdf->stream('koleksis_report.pdf');
    }

    public function ReportPemijaman()
    {
        $pinjams = PinjamModel::all();
        // Load PDF view
        $pdf = PDF::loadView('report.pinjams_report', compact('pinjams'));
        $pdf->setPaper('F4', 'landscape');
        // return $pdf->download('users_report.pdf');
        return $pdf->stream('pinjams_report.pdf');
    }

    public function ReportPengembalian()
    {
        $kembalis = KembaliModel::all();
        // Load PDF view
        $pdf = PDF::loadView('report.kembalis_report', compact('kembalis'));
        $pdf->setPaper('F4', 'landscape');
        // return $pdf->download('users_report.pdf');
        return $pdf->stream('kembalis_report.pdf');
    }

    public function index()
    {
        $data = [];
        return view('report/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     */
    public function show($trxPinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kembalis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kembali)
    {
        //
    }
}
