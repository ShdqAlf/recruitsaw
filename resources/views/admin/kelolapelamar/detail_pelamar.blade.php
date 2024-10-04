@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Detail Data Pelamar</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card card-body">
            <h5 class="card-title">Detail Pelamar</h5>
            <p><strong>Nama:</strong> {{ $pelamar->nama }}</p>
            <p><strong>Email:</strong> {{ $pelamar->email }}</p>
            <p><strong>Telepon:</strong> {{ $pelamar->no_telepon }}</p>
            <p><strong>Alamat:</strong> {{ $pelamar->alamat }}</p>
            <p><strong>Pendidikan Terakhir:</strong> {{ $pelamar->pendidikan_terakhir }}</p>
            <p><strong>Riwayat Pekerjaan:</strong> {{ $pelamar->riwayat_pekerjaan }}</p>
            <p><strong>Posisi Dilamar:</strong> {{ $pelamar->posisi_dilamar }}</p>
            <p><strong>Tanggal Lamaran:</strong> {{ $pelamar->tanggal_lamaran }}</p>
            <p><strong>Status Lamaran:</strong> {{ $pelamar->status_lamaran }}</p>
            <!-- Add buttons for actions like evaluation, edit, or sending emails -->
            <button class="btn btn-primary">Penilaian Pelamar</button>
            <button class="btn btn-secondary">Konfirmasi Status</button>
        </div>
    </section>
</div>
@endsection
