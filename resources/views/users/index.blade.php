@extends('layouts.layout')
@section('content')
    <section class="section" style="margin: 3rem">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-secondary">
                            Tambah User
                        </a>
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($users as $row)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $row->nm_pengguna }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->hak_akses }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $row->id) }}" method="POST"
                                                style="display: inline"
                                                onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><span
                                                        class="text-muted">
                                                        Delete
                                                    </span></button>
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
    @endsection
