@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2><i class="fas fa-book"></i> Materi Pendukung Psikososial</h2>
            <p class="text-muted mb-0">Panduan singkat untuk mendukung kenyamanan dan pemulihan peserta.</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('peserta.psychosocial.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Panduan Sesi</h5>
                    <p class="text-muted mb-0">
                        Susun sesi 20–30 menit dengan fokus pada rasa aman, interaksi ringan, dan refleksi singkat.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Latihan Relaksasi</h5>
                    <p class="text-muted mb-0">
                        Gunakan teknik pernapasan 4-4-4 atau peregangan ringan sebelum kegiatan inti dimulai.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Emosi</h5>
                    <p class="text-muted mb-0">
                        Amati perubahan emosi peserta dan lakukan pendekatan personal bila diperlukan.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Rujukan Profesional</h5>
                    <p class="text-muted mb-0">
                        Jika ada tanda distress berat, koordinasikan dengan konselor atau layanan kesehatan setempat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
