@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2><i class="fas fa-heart"></i> {{ $activity->name }}</h2>
            <p class="text-muted mb-1">
                <i class="fas fa-tag"></i> {{ $activity->category ?? 'Umum' }}
            </p>
            <p class="text-muted mb-0">
                <i class="fas fa-clock"></i> {{ $activity->duration_minutes ?? '-' }} menit
            </p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('peserta.psychosocial.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Deskripsi Kegiatan</h5>
            <p class="text-muted">{{ $activity->description ?? 'Deskripsi belum tersedia.' }}</p>

            <hr>

            <h5 class="card-title">Panduan Singkat</h5>
            <ul class="text-muted mb-0">
                <li>Mulai dengan pemanasan ringan dan suasana aman.</li>
                <li>Ikuti instruksi fasilitator dan lakukan sesuai kemampuan.</li>
                <li>Berhenti jika merasa tidak nyaman dan laporkan ke pendamping.</li>
            </ul>
        </div>
    </div>

    <div class="mt-4 d-flex flex-wrap gap-2">
        <a href="{{ route('peserta.psychosocial.resources') }}" class="btn btn-outline-primary">
            <i class="fas fa-book"></i> Lihat Materi Pendukung
        </a>
        <a href="{{ route('peserta.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-home"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
