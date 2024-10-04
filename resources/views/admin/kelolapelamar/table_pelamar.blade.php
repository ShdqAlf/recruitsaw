@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Kelola Data Pelamar</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Data Pelamar</h4>
            
            </div>
            <div class="card-body">
                <table id="pelamarTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Posisi Dilamar</th>
                            <th>Tanggal Lamaran</th>
                            <th>Status Lamaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelamars as $key => $pelamar)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pelamar->nama }}</td>
                            <td>{{ $pelamar->posisi_dilamar }}</td>
                            <td>{{ $pelamar->tanggal_lamaran }}</td>
                            <td>{{ $pelamar->status_lamaran }}</td>
                            <td>
                                <a href="{{ route('pelamars.show', $pelamar->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pelamarTable').DataTable({
            "responsive": true,
            "autoWidth": false
        });
    });
</script>
@endsection
