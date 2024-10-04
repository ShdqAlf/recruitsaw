@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Penilaian Pelamar</h3>
</div>

<div class="page-content">
    <section class="section">
        <form action="{{ route('pelamars.confirm', $pelamar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card card-body">
                <h5>Nilai Pelamar</h5>
                <!-- Aspek-aspek yang dinilai -->
                <div class="mb-3">
                    <label class="form-label">Skor Keterampilan</label>
                    <input type="number" class="form-control" name="skor_keterampilan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Skor Pengalaman</label>
                    <input type="number" class="form-control" name="skor_pengalaman">
                </div>
                <div class="mb-3">
                    <label class="form-label">Skor Pendidikan</label>
                    <input type="number" class="form-control" name="skor_pendidikan">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
            </div>
        </form>
    </section>
</div>
@endsection
