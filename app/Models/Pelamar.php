<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamars'; // Nama tabel di database
    protected $fillable = ['nama', 'email', 'no_telepon', 'alamat', 'pendidikan_terakhir', 'riwayat_pekerjaan', 'posisi_dilamar', 'tanggal_lamaran', 'status_lamaran'];
}
