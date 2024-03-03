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
    <h3>Report Anggotas</h3>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Jk</th>
                <th scope="col">Tmpt Lahir</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Hp</th>
                <th scope="col">Jns Anggota</th>
                <th scope="col">Jml Pinjam</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($anggotas as $row)
                <?php $no++; ?>
                <tr>
                    <th scope="row">{{ $no }}</th>
                    <td>{{ $row->kd_anggota }}</td>
                    <td>{{ $row->nm_anggota }}</td>
                    <td>{{ $row->jk }}</td>
                    <td>{{ $row->tp_lahir }}</td>
                    <td>{{ $row->tg_lahir }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td>{{ $row->jns_anggota }}</td>
                    <td>{{ $row->jml_pjm }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
