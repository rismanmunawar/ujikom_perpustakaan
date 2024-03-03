@extends('layouts.layout')
@section('content')
    <main class="login-form">
        <section class="section" style="margin: 3rem">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Add Anggota</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('anggotas.store') }}" method="POST" class="row">
                                @csrf
                                <div class="col-md-6 g-3">
                                    <label for="kd_anggota" class="form-label">Kode Anggota</label>
                                    <input type="text" id="kd_anggota" class="form-control" name="kd_anggota"
                                        value="{{ $nextKode }}" required autofocus readonly>
                                    @if ($errors->has('kd_anggota'))
                                        <span class="text-danger">{{ $errors->first('kd_anggota') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 g-3">
                                    <label for="nm_anggota" class="form-label">Nama Anggota</label>
                                    <input type="text" id="nm_anggota" class="form-control" name="nm_anggota" required
                                        autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 g-3">
                                    <label for="jk" class="form-label">Jenis
                                        Kelamin</label>
                                    <select class="form-select" id="jk" name="jk" aria-label="jk">
                                        <option value="">Choose</option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @if ($errors->has('jk'))
                                        <span class="text-danger">{{ $errors->first('jk') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 g-3">
                                    <label for="tp_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" id="tp_lahir" class="form-control" name="tp_lahir" required
                                        autofocus>
                                    @if ($errors->has('tp_lahir'))
                                        <span class="text-danger">{{ $errors->first('tp_lahir') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 g-3">
                                    <label for="tg_lahir" class="form-label">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tg_lahir" class="form-control" name="tg_lahir" required
                                        autofocus>
                                    @if ($errors->has('tg_lahir'))
                                        <span class="text-danger">{{ $errors->first('tg_lahir') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 g-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" name="alamat" required
                                        autofocus>
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 g-3">
                                    <label for="no_hp" class="form-label">No Handphone</label>
                                    <input type="number" id="no_hp" class="form-control" name="no_hp" required
                                        autofocus>
                                    @if ($errors->has('no_hp'))
                                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 g-3">
                                    <label for="jns_anggota" class="form-label">Jenis
                                        Anggota</label>
                                    <select class="form-select" id="jns_anggota" name="jns_anggota"
                                        aria-label="jns_anggota">
                                        <option value="">Choose</option>
                                        <option value="Member">Member</option>
                                        <option value="Non Member">Non Member</option>
                                    </select>
                                    @if ($errors->has('jns_anggota'))
                                        <span class="text-danger">{{ $errors->first('jns_anggota') }}</span>
                                    @endif
                                </div>
                                <input type="hidden" name="jml_pjm" value="0">
                                <div class="col-md-6 g-3">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                                <div class="col-md-6 g-3">
                                    <button class="btn btn-danger " onclick="history.back()">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
