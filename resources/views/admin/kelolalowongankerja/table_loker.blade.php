@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Kelola Lowongan Kerja</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Lowongan Kerja</h4>
                <!-- Tombol untuk menambah lowongan -->
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahLowonganModal">
                    Tambah Lowongan
                </button>
            </div>
            <div class="card-body">
                <table id="lokerTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pekerjaan</th>
                            <th>Perusahaan</th>
                            <th>Lokasi</th>
                            <th>Tanggal Dibuka</th>
                            <th>Tanggal Ditutup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowongans as $key => $lowongan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $lowongan->judul }}</td>
                            <td>{{ $lowongan->perusahaan }}</td>
                            <td>{{ $lowongan->lokasi }}</td>
                            <td>{{ $lowongan->tanggal_dibuka }}</td>
                            <td>{{ $lowongan->tanggal_ditutup }}</td>
                            <td>
                                <!-- Tombol aksi -->
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editLowonganModal{{ $lowongan->id }}">Edit</button>
                                <form action="{{ route('lowongans.destroy', $lowongan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Lowongan -->
                        <div class="modal fade" id="editLowonganModal{{ $lowongan->id }}" tabindex="-1" aria-labelledby="editLowonganModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLowonganModalLabel">Edit Lowongan Kerja</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form edit lowongan -->
                                        <form action="{{ route('lowongans.update', $lowongan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="judulLowongan" class="form-label">Judul Pekerjaan</label>
                                                <input type="text" class="form-control" name="judul" value="{{ $lowongan->judul }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="perusahaanLowongan" class="form-label">Perusahaan</label>
                                                <input type="text" class="form-control" name="perusahaan" value="{{ $lowongan->perusahaan }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="lokasiLowongan" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" name="lokasi" value="{{ $lowongan->lokasi }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggalDibuka" class="form-label">Tanggal Dibuka</label>
                                                <input type="date" class="form-control" name="tanggal_dibuka" value="{{ $lowongan->tanggal_dibuka }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggalDitutup" class="form-label">Tanggal Ditutup</label>
                                                <input type="date" class="form-control" name="tanggal_ditutup" value="{{ $lowongan->tanggal_ditutup }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Lowongan -->
<div class="modal fade" id="tambahLowonganModal" tabindex="-1" aria-labelledby="tambahLowonganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLowonganModalLabel">Tambah Lowongan Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form tambah lowongan -->
                <form action="{{ route('lowongans.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judulLowongan" class="form-label">Judul Pekerjaan</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul Lowongan">
                    </div>
                    <div class="mb-3">
                        <label for="perusahaanLowongan" class="form-label">Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan" placeholder="Nama Perusahaan">
                    </div>
                    <div class="mb-3">
                        <label for="lokasiLowongan" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalDibuka" class="form-label">Tanggal Dibuka</label>
                        <input type="date" class="form-control" name="tanggal_dibuka">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalDitutup" class="form-label">Tanggal Ditutup</label>
                        <input type="date" class="form-control" name="tanggal_ditutup">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Tambahkan DataTables JS dan inisialisasi DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#lokerTable').DataTable(); // Inisialisasi DataTables
    });
</script>
@endsection
