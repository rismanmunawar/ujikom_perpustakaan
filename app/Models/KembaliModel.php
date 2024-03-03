<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KembaliModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi_kembalis';
    protected $fillable = [
        'no_transaksi_pinjam',
        'no_transaksi_kembali',
        'kd_anggota',
        'tg_pinjam',
        'tg_kembali',
        'kd_koleksi',
        'judul',
        'jns_bhn_pustaka',
        'jns_koleksi',
        'jns_media',
        'denda',
        'ket',
        'id_pengguna',
    ];
}
