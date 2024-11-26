@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Kelola Jadwal Interview</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Jadwal Interview</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInterviewModal">Tambah Jadwal</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="interviewTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelamar</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interviews as $key => $interview)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $interview->nama_pelamar }}</td>
                            <td>{{ $interview->tanggal }}</td>
                            <td>{{ $interview->waktu }}</td>
                            <td>{{ $interview->lokasi }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editInterviewModal{{ $interview->id }}">Edit</button>
                                <form action="{{ route('jadwal.destroy', $interview->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @include('admin.jadwal.edit', ['interview' => $interview])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@include('admin.jadwal.create')

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#interviewTable').DataTable();
    });
</script>
@endsection
