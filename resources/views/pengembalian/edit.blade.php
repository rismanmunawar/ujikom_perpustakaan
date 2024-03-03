@extends('layouts.layout')
@section('content')
    <main class="login-form">
        <section class="section" style="margin: 3rem">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Data Pinjaman</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kembalis.update', $kembalis->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mt-3">
                                    <label for="no_transaksi_kembali" class="col-md-4 col-form-label text-right">No
                                        Transaksi
                                        Peminjaman</label>
                                    <div class="col-md-6">
                                        <input type="text" id="no_transaksi_kembali" class="form-control"
                                            name="no_transaksi_kembali" value="{{ $kembalis->no_transaksi_kembali }}"
                                            required autofocus readonly>
                                        @if ($errors->has('no_transaksi_kembali'))
                                            <span class="text-danger">{{ $errors->first('no_transaksi_kembali') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="no_transaksi_pinjam" class="col-md-4 col-form-label text-right">No Transaksi
                                        Peminjaman</label>
                                    <div class="col-md-6">
                                        <select id="no_transaksi_pinjam" class="form-control" name="no_transaksi_pinjam"
                                            required autofocus>
                                            <option value="">Pilih No Transaksi</option>
                                            @foreach ($pinjams as $pinjam)
                                                <option value="{{ $pinjam->no_transaksi_pinjam }}"
                                                    data-kode-anggota="{{ $pinjam->kd_anggota }}"
                                                    data-tg-pinjam="{{ $pinjam->tg_pinjam }}"
                                                    data-tg-kembali="{{ $pinjam->tg_bts_kembali }}"
                                                    data-kd-koleksi="{{ $pinjam->kd_koleksi }}"
                                                    data-judul="{{ $pinjam->judul }}"
                                                    data-jns-bhn-pustaka="{{ $pinjam->jns_bhn_pustaka }}"
                                                    data-jns-koleksi="{{ $pinjam->jns_koleksi }}"
                                                    data-jns-media="{{ $pinjam->jns_media }}"
                                                    {{ $pinjam->no_transaksi_pinjam == $kembalis->no_transaksi_pinjam ? 'selected' : '' }}>
                                                    {{ $pinjam->no_transaksi_pinjam }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('no_transaksi_pinjam'))
                                            <span class="text-danger">{{ $errors->first('no_transaksi_pinjam') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="kd_anggota" class="col-md-4 col-form-label text-right">Kode Anggota</label>
                                    <div class="col-md-6">
                                        <input type="text" id="kd_anggota" class="form-control" name="kd_anggota"
                                            value="{{ $kembalis->kd_anggota }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="tg_pinjam" class="col-md-4 col-form-label text-right">Tanggal Pinjam</label>
                                    <div class="col-md-6">
                                        <input type="text" id="tg_pinjam" class="form-control" name="tg_pinjam"
                                            value="{{ $kembalis->tg_pinjam }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="tg_kembali" class="col-md-4 col-form-label text-right">Tanggal
                                        Kembali</label>
                                    <div class="col-md-6">
                                        <input type="date" id="tg_kembali" class="form-control" name="tg_kembali"
                                            value="{{ $kembalis->tg_kembali }}" required>
                                        @if ($errors->has('tg_kembali'))
                                            <span class="text-danger">{{ $errors->first('tg_kembali') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="kd_koleksi" class="col-md-4 col-form-label text-right">Kode Koleksi</label>
                                    <div class="col-md-6">
                                        <input type="text" id="kd_koleksi" class="form-control" name="kd_koleksi"
                                            value="{{ $kembalis->kd_koleksi }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="judul" class="col-md-4 col-form-label text-right">Judul</label>
                                    <div class="col-md-6">
                                        <input type="text" id="judul" class="form-control" name="judul"
                                            value="{{ $kembalis->judul }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="jns_bhn_pustaka" class="col-md-4 col-form-label text-right">Jenis Bahan
                                        Koleksi</label>
                                    <div class="col-md-6">
                                        <input type="text" id="jns_bhn_pustaka" class="form-control"
                                            name="jns_bhn_pustaka" value="{{ $kembalis->jns_bhn_pustaka }}" required
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="jns_koleksi" class="col-md-4 col-form-label text-right">Jenis
                                        Koleksi</label>
                                    <div class="col-md-6">
                                        <input type="text" id="jns_koleksi" class="form-control" name="jns_koleksi"
                                            value="{{ $kembalis->jns_koleksi }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="jns_media" class="col-md-4 col-form-label text-right">Jenis Media</label>
                                    <div class="col-md-6">
                                        <input type="text" id="jns_media" class="form-control" name="jns_media"
                                            value="{{ $kembalis->jns_media }}" required readonly>
                                    </div>
                                </div>


                                <div class="form-group row mt-3">
                                    <label for="denda" class="col-md-4 col-form-label text-right">Denda</label>
                                    <div class="col-md-6">
                                        <input type="text" id="denda" class="form-control" name="denda"
                                            value="{{ $kembalis->denda }}" required readonly autofocus>
                                        @if ($errors->has('denda'))
                                            <span class="text-danger">{{ $errors->first('denda') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="ket" class="col-md-4 col-form-label text-right">Keterangan</label>
                                    <div class="col-md-6">
                                        <input type="text" id="ket" class="form-control" name="ket"
                                            value="{{ $kembalis->ket }}" required autofocus>
                                        @if ($errors->has('ket'))
                                            <span class="text-danger">{{ $errors->first('ket') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('kembalis.index') }}" class="btn btn-danger mt-2">
                                        <i class="bi bi-x"></i>
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('assets/static/js/components/pengembalian.js') }}"></script>
@endsection
