@extends('layouts.admin')

@section('page-title', 'Statistik Program')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">Statistik & Log Book</h4>
            <div class="text-muted small">Data ini tampil di landing page.</div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.landing.schedules.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-calendar-alt me-2"></i>Jadwal Landing
            </a>
            <a href="{{ route('admin.landing.stats.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Statistik
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Tanggal Log</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats as $stat)
                            <tr>
                                <td class="fw-semibold">{{ $stat->title }}</td>
                                <td>
                                    @if($stat->image_url)
                                        <a href="{{ $stat->image_url }}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $stat->log_date ? $stat->log_date->translatedFormat('d M Y') : '-' }}</td>
                                <td>{{ $stat->display_order }}</td>
                                <td>{{ $stat->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                                <td>
                                    <a href="{{ route('admin.landing.stats.edit', $stat) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.landing.stats.destroy', $stat) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data statistik ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data statistik.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $stats->links() }}
        </div>
    </div>
</div>
@endsection
