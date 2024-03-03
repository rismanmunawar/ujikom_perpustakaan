<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* CSS untuk desain tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Tombol */
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }

        .btn:hover {
            background-color: #286090;
            border-color: #204d74;
        }

        .btn-danger {
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #ac2925;
        }
    </style>
</head>

<body>
    <h3>Report Pengembalian</h3>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
