@extends('layouts.layout')
@section('content')
    <section class="section" style="margin: 3rem">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pengembalian</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('kembalis.create') }}" class="btn btn-sm btn-secondary">
                            Tambah Pengembalian
                        </a>
                        <div class="table-responsive">
                            <table class="table mb-0 table-responsive-sm" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>No. Trs Peminjaman</th>
                                        <th>No. Trs Pengembalian</th>
                                        <th>Kode Anggota</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Kembali</th>
                                        <th>Kode Koleksi</th>
                                        <th>Judul</th>
                                        <th>Jenis Bahan Pustaka</th>
                                        <th>Jenis Koleksi</th>
                                        <th>Jenis Media</th>
                                        <th>Denda</th>
                                        <th>ket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($kembalis as $row)
                                        {{-- Untuk Mengatur Format date agar d/m/y --}}
                                        <?php
                                        $no++;
                                        $tg_pinjam = \Carbon\Carbon::parse($row->tg_pinjam)->format('d/m/Y');
                                        $tg_kembali = \Carbon\Carbon::parse($row->tg_kembali)->format('d/m/Y');
                                        ?>
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $row->no_transaksi_pinjam }}</td>
                                            <td>{{ $row->no_transaksi_kembali }}</td>
                                            <td>{{ $row->kd_anggota }}</td>
                                            <td>{{ $tg_pinjam }}</td>
                                            <td>{{ $tg_kembali }}</td>
                                            <td>{{ $row->kd_koleksi }}</td>
                                            <td>{{ $row->judul }}</td> <!-- Menggunakan properti objek yang sesuai -->
                                            <td>{{ $row->jns_bhn_pustaka }}</td>
                                            <td>{{ $row->jns_koleksi }}</td>
                                            <td>{{ $row->jns_media }}</td>
                                            <td>{{ $row->denda }}</td> <!-- Menggunakan properti objek yang sesuai -->
                                            <td>{{ $row->ket }}</td>
                                            <td>
                                                <a href="{{ route('kembalis.edit', $row->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="{{ route('kembalis.show', $row->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <form action="{{ route('kembalis.destroy', $row->id) }}" method="POST"
                                                    style="display: inline"
                                                    onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
