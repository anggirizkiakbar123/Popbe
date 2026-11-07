@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=Manrope:wght@300;400;600;700;800&display=swap');

    :root {
        --ink: #0f172a;
        --ink-2: #1f2937;
        --muted: #6b7280;
        --primary: #2563eb;
        --primary-2: #0ea5e9;
        --accent: #22c55e;
        --card: #ffffff;
        --surface: #f5f7fb;
        --soft: #e9f1ff;
        --shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
    }

    .landing {
        font-family: 'Manrope', sans-serif;
        color: var(--ink);
        background: radial-gradient(circle at 20% 10%, #f8fafc 0%, #f3f6fb 40%, #eef2f7 100%);
    }

    .hero-banner {
        position: relative;
        overflow: hidden;
        padding: 88px 0 70px;
        background:
            radial-gradient(circle at 12% 18%, rgba(37, 99, 235, 0.16) 0, transparent 38%),
            radial-gradient(circle at 82% 12%, rgba(14, 165, 233, 0.2) 0, transparent 40%),
            linear-gradient(120deg, #ffffff 0%, #f1f5ff 50%, #eef2f7 100%);
    }

    .hero-banner::after {
        content: "";
        position: absolute;
        right: -140px;
        top: -120px;
        width: 520px;
        height: 520px;
        background: radial-gradient(circle at 30% 30%, #60a5fa 0%, #2563eb 55%, #1e3a8a 100%);
        clip-path: polygon(40% 0, 100% 0, 100% 72%, 65% 100%, 18% 70%);
        opacity: 0.95;
        filter: blur(0.2px);
    }

    .hero-banner::before {
        content: "";
        position: absolute;
        left: -130px;
        bottom: -160px;
        width: 360px;
        height: 360px;
        background: radial-gradient(circle at 60% 60%, #7dd3fc 0%, #38bdf8 60%, #1d4ed8 100%);
        clip-path: polygon(0 18%, 58% 0, 100% 60%, 48% 100%, 0 68%);
        opacity: 0.7;
    }

    .hero-inner {
        position: relative;
        z-index: 2;
    }

    .hero-badges {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 18px;
    }

    .hero-badge {
        background: rgba(37, 99, 235, 0.12);
        color: #1d4ed8;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .logo-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
    }

    .logo-img {
        max-height: 48px;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid #e5e7eb;
        border-radius: 999px;
        padding: 8px 14px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        backdrop-filter: blur(6px);
    }

    .hero-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 3.6rem;
        letter-spacing: -0.5px;
        line-height: 1;
        margin-bottom: 12px;
        color: #0b1220;
        text-transform: uppercase;
    }

    .hero-subtitle {
        font-size: 1.05rem;
        color: #334155;
        max-width: 680px;
        margin: 0 auto 16px;
        text-align: center;
        font-weight: 600;
    }

    .hero-campus {
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.05rem;
        margin-bottom: 24px;
        color: #1e293b;
    }

    .date-stack {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .date-card {
        background: linear-gradient(145deg, #2563eb, #1d4ed8);
        color: white;
        border-radius: 20px;
        padding: 18px;
        text-align: center;
        box-shadow: 0 16px 34px rgba(37, 99, 235, 0.35);
    }

    .date-card span {
        display: block;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .date-card strong {
        font-size: 2.4rem;
        line-height: 1;
    }

    .location-card {
        background: linear-gradient(145deg, #0f172a, #1f2937);
        color: white;
        border-radius: 20px;
        padding: 18px;
        margin-top: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        text-align: center;
        box-shadow: var(--shadow);
    }

    .hero-cta {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 18px;
        flex-wrap: wrap;
    }

    .hero-quicknav {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 14px;
    }

    .hero-quicknav a {
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 700;
        color: #1d4ed8;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.75);
        border: 1px solid rgba(37, 99, 235, 0.25);
        transition: all 0.2s ease;
    }

    .hero-quicknav a:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-1px);
    }

    .btn-hero {
        padding: 0.85rem 1.8rem;
        border-radius: 999px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, #2563eb, #0ea5e9);
        color: white;
        box-shadow: 0 16px 30px rgba(37, 99, 235, 0.35);
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
    }

    .btn-hero-secondary {
        background: white;
        color: #1d4ed8;
        border: 2px solid #1d4ed8;
    }

    .section {
        padding: 78px 0;
    }

    .section-intro {
        max-width: 640px;
    }

    .section-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2.3rem;
        letter-spacing: -0.5px;
        margin-bottom: 16px;
        color: #0b1220;
    }

    .card-clean {
        background: var(--card);
        border-radius: 22px;
        padding: 26px;
        box-shadow: var(--shadow);
        height: 100%;
        border: 1px solid rgba(15, 23, 42, 0.05);
    }

    .pill-tag {
        display: inline-block;
        background: var(--soft);
        color: #1d4ed8;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 0.75rem;
        margin-bottom: 12px;
        letter-spacing: 0.4px;
        text-transform: uppercase;
    }

    .timeline {
        border-left: 2px dashed #d1d5db;
        padding-left: 18px;
    }

    .timeline-item {
        margin-bottom: 18px;
    }

    .timeline-item h6 {
        font-weight: 800;
        margin-bottom: 6px;
        color: #111827;
    }

    .timeline-item .log-wrap {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    .timeline-item .log-thumb {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
        border: 1px solid #e5e7eb;
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.12);
    }

    .cta-band {
        background: linear-gradient(140deg, #0f172a, #2563eb);
        color: white;
        border-radius: 24px;
        padding: 36px;
        box-shadow: var(--shadow);
    }

    .map-frame {
        width: 100%;
        min-height: 320px;
        border: 0;
        border-radius: 18px;
        box-shadow: var(--shadow);
    }

    .filter-chip {
        border: 1px solid #dbe2ea;
        background: white;
        color: #1f2937;
        padding: 6px 14px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.2s ease;
    }

    .filter-chip.badge {
        border: none;
        background: var(--soft);
        color: #1d4ed8;
    }

    .filter-chip.active,
    .filter-chip:hover {
        background: #1d4ed8;
        color: white;
        border-color: #1d4ed8;
    }

    .score-card {
        border-radius: 18px;
        padding: 20px;
        background: linear-gradient(160deg, #0f172a, #111827);
        color: white;
        position: relative;
        box-shadow: var(--shadow);
    }

    .score-card .live-badge {
        position: absolute;
        right: 16px;
        top: 16px;
        background: #ef4444;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 14px;
        margin-top: 18px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 14px 16px;
        border: 1px solid #e6eef7;
        position: relative;
        overflow: hidden;
        min-height: 120px;
    }

    .stat-card strong {
        font-size: 1.05rem;
        display: block;
        color: #0f172a;
    }

    .stat-card span {
        color: #64748b;
        font-size: 0.85rem;
    }

    .stat-card img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.12;
        pointer-events: none;
    }

    .table thead th {
        white-space: nowrap;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .table .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        background: #eef2ff;
        color: #1d4ed8;
    }

    .table .status-pill.live {
        background: #fee2e2;
        color: #dc2626;
    }

    .footer-note {
        color: var(--muted);
        font-size: 0.9rem;
    }

    @media (max-width: 992px) {
        .hero-title {
            font-size: 3rem;
        }
        .date-stack {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.2rem;
        }
        .hero-subtitle {
            font-size: 0.95rem;
        }
        .section {
            padding: 62px 0;
        }
    }
</style>

<div class="landing">
    <section class="hero-banner">
        <div class="container hero-inner text-center">
            <div class="logo-strip">
                <img class="logo-img" src="{{ asset('images/logos/IACBE-Member-with-Accredited-Programs-New-Logo-2024.png') }}" alt="IACBE">
                <img class="logo-img" src="{{ asset('images/logos/logo-bima-21.09.2022.11.56.32.png') }}" alt="BiMA">
                <img class="logo-img" src="{{ asset('images/logos/diktisaintek-berdampak.a30b8719.png') }}" alt="Diktisaintek Berdampak">
                <img class="logo-img" src="{{ asset('images/logos/unimal.png') }}" alt="Universitas Malikussaleh">
                <img class="logo-img" src="{{ asset('images/logos/Logo%20BLU%20Speed.png') }}" alt="BLU">
                <img class="logo-img" src="{{ asset('images/logos/tut-wuri-handayani-logo-with-white-text-png-b461.png') }}" alt="Kemendikbud">
            </div>

            <div class="hero-badges">
                <span class="hero-badge">Program Mahasiswa Berdampak</span>
                <span class="hero-badge">Pendanaan Diktisaintek</span>
                <span class="hero-badge">Aceh Tengah</span>
            </div>

            <h1 class="hero-title">Program Mahasiswa Berdampak Pendanaan Diktisaintek</h1>
            <p class="hero-subtitle">
                Penguatan Kebugaran, Resiliensi Psikososial, dan Kesiapsiagaan Bencana melalui Program Pembinaan Olahraga
                bagi Anak - Remaja Pascabencana
            </p>
            <div class="hero-campus">Universitas Malikussaleh</div>

            <div class="row justify-content-center align-items-center g-4">
                <div class="col-lg-7">
                    <div class="card-clean text-start">
                        <div class="pill-tag">Program Inti</div>
                        <h3 class="section-title mb-2">Fokus Intervensi</h3>
                        <p class="text-muted mb-4">
                            Program terpadu untuk membangun kebugaran fisik, kesehatan mental, serta kesiapsiagaan bencana
                            dengan pendekatan latihan olahraga yang aman, adaptif, dan terukur.
                        </p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card-clean">
                                    <div class="fw-bold mb-2"><i class="fas fa-dumbbell me-2 text-primary"></i>Kebugaran</div>
                                    <div class="text-muted small">Latihan terstruktur, monitoring progres.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean">
                                    <div class="fw-bold mb-2"><i class="fas fa-heart me-2 text-danger"></i>Psikososial</div>
                                    <div class="text-muted small">Pemulihan trauma, regulasi emosi.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean">
                                    <div class="fw-bold mb-2"><i class="fas fa-shield-alt me-2 text-success"></i>Kesiapsiagaan</div>
                                    <div class="text-muted small">Edukasi bencana dan simulasi aman.</div>
                                </div>
                            </div>
                        </div>

                        <div class="hero-cta">
                            <a href="{{ route('login') }}" class="btn-hero btn-hero-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </a>
                            <a href="{{ route('register') }}" class="btn-hero btn-hero-secondary">
                                <i class="fas fa-user-plus me-2"></i>Daftar
                            </a>
                        </div>

                        <div class="hero-quicknav">
                            <a href="#jadwal">Jadwal</a>
                            <a href="#live-score">Live Score</a>
                            <a href="#statistik">Statistik</a>
                            <a href="#faq">FAQ</a>
                            <a href="#olahraga">Cabang</a>
                        </div>

                        @if($landingStats->count() > 0)
                            <div class="stats-grid">
                                @foreach($landingStats->take(4) as $stat)
                                    <div class="stat-card">
                                        @if($stat->image_url)
                                            <img src="{{ $stat->image_url }}" alt="{{ $stat->title }}">
                                        @endif
                                        <strong>{{ $stat->title }}</strong>
                                        <span>Program dilaksanakan</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="date-stack" id="tanggal-kegiatan">
                        <div class="date-card">
                            @if($firstSchedule && $firstSchedule->match_date)
                                <strong>{{ $firstSchedule->match_date->format('d') }}</strong>
                                <span>{{ $firstSchedule->match_date->translatedFormat('F') }}</span>
                                <span>{{ $firstSchedule->match_date->format('Y') }}</span>
                            @else
                                <span>Belum dijadwalkan</span>
                            @endif
                        </div>
                        <div class="date-card">
                            @if($lastSchedule && $lastSchedule->match_date)
                                <strong>{{ $lastSchedule->match_date->format('d') }}</strong>
                                <span>{{ $lastSchedule->match_date->translatedFormat('F') }}</span>
                                <span>{{ $lastSchedule->match_date->format('Y') }}</span>
                            @else
                                <span>Belum dijadwalkan</span>
                            @endif
                        </div>
                    </div>
                    <div class="location-card mt-3">
                        Desa Jongok Meluem<br>
                        Kebayakan, Aceh Tengah
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="card-clean h-100">
                        <div class="pill-tag">Tentang Program</div>
                        <h3 class="section-title">Program Pemulihan Berbasis Olahraga</h3>
                        <p class="text-muted">
                            Pendampingan singkat, terukur, dan aman untuk membangun kebugaran, resiliensi, serta kesiapsiagaan
                            anak dan remaja pascabencana.
                        </p>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h6>1. Pemetaan Cepat</h6>
                                <div class="text-muted small">Identifikasi kebutuhan, sasaran, dan kesiapan lokasi.</div>
                            </div>
                            <div class="timeline-item">
                                <h6>2. Pelaksanaan Program</h6>
                                <div class="text-muted small">Latihan terstruktur, edukasi bencana, dan dukungan psikososial.</div>
                            </div>
                            <div class="timeline-item">
                                <h6>3. Evaluasi Dampak</h6>
                                <div class="text-muted small">Umpan balik, perbaikan, dan dokumentasi hasil.</div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm px-4">
                                Daftar Peserta
                            </a>
                            <a href="#statistik" class="btn btn-outline-secondary btn-sm px-4 ms-2">
                                Lihat Program
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-clean h-100">
                        <div class="pill-tag">Layanan Utama</div>
                        <h3 class="section-title">Fitur Utama</h3>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-primary mb-2"><i class="fas fa-calendar-alt"></i></div>
                                    <div class="fw-bold">Jadwal Terpadu</div>
                                    <div class="text-muted small">Agenda latihan dan kegiatan terstruktur.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-danger mb-2"><i class="fas fa-broadcast-tower"></i></div>
                                    <div class="fw-bold">Live Activity</div>
                                    <div class="text-muted small">Pantau sesi aktif secara real-time.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-success mb-2"><i class="fas fa-chart-line"></i></div>
                                    <div class="fw-bold">Log Book</div>
                                    <div class="text-muted small">Ringkasan program dan progres peserta.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-warning mb-2"><i class="fas fa-map-marked-alt"></i></div>
                                    <div class="fw-bold">Lokasi Kegiatan</div>
                                    <div class="text-muted small">Informasi tempat dan peta.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-info mb-2"><i class="fas fa-running"></i></div>
                                    <div class="fw-bold">Cabang Olahraga</div>
                                    <div class="text-muted small">Daftar olahraga yang dipertandingkan.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-clean h-100 text-center">
                                    <div class="display-6 text-secondary mb-2"><i class="fas fa-shield-alt"></i></div>
                                    <div class="fw-bold">Kesiapsiagaan</div>
                                    <div class="text-muted small">Materi aman dan adaptif.</div>
                                </div>
                            </div>
                        </div>
                        <div class="cta-band mt-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <div class="fw-bold fs-5">Siap bergabung?</div>
                                    <div class="small">Daftarkan peserta dan pantau kegiatan dengan mudah.</div>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('register') }}" class="btn btn-light btn-sm px-3">
                                        Daftar Peserta
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm px-3">
                                        Masuk Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-note mt-3">
                            Info resmi:
                            <a href="https://www.instagram.com/gerakuntukpulih.id?igsh=MWh4eGhicnJhdnQ3cw==" target="_blank" rel="noopener noreferrer">
                                <strong>@gerakuntukpulih.id</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-0" id="lokasi">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="card-clean h-100">
                        <div class="pill-tag">Lokasi Kegiatan</div>
                        <h3 class="section-title">Desa Jongok Meluem</h3>
                        <p class="text-muted">
                            Kecamatan Kebayakan, Aceh Tengah. Titik utama kegiatan dipusatkan di area lapangan desa dan
                            fasilitas pendukung masyarakat.
                        </p>
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <div class="card-clean">
                                    <div class="fw-bold mb-1">Alamat</div>
                                    <div class="text-muted small">Desa Jongok Meluem, Kebayakan, Aceh Tengah</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-clean">
                                    <div class="fw-bold mb-1">Koordinat</div>
                                    <div class="text-muted small">4.6408063, 96.854117</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe
                        class="map-frame"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d698.9998005180341!2d96.854117!3d4.6408063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1738850000000">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="jadwal">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card-clean h-100">
                        <div class="pill-tag">Jadwal Pertandingan</div>
                        <h3 class="section-title">Agenda Per Cabang</h3>
                        @if($selectedSport)
                            <div class="section-intro text-muted mb-3">
                                Menampilkan jadwal untuk cabang <strong>{{ $selectedSport->name }}</strong>.
                                <a href="{{ route('landing') }}" class="ms-2 text-decoration-none" data-sport-filter>Reset filter</a>
                            </div>
                        @endif
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <a class="filter-chip {{ empty($sportId) ? 'active' : '' }}" href="{{ route('landing') }}" data-sport-filter>Semua</a>
                            @foreach($sports as $sport)
                                <a class="filter-chip {{ (int) $sportId === $sport->id ? 'active' : '' }}"
                                   href="{{ route('landing', ['sport_id' => $sport->id]) }}" data-sport-filter>
                                    {{ $sport->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Cabang</th>
                                        <th>Pertandingan</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->match_date ? $schedule->match_date->translatedFormat('d M Y H:i') : '-' }}</td>
                                            <td>{{ $schedule->sport->name ?? '-' }}</td>
                                            <td>
                                                @if($schedule->team_home || $schedule->team_away)
                                                    {{ $schedule->team_home ?? '-' }} vs {{ $schedule->team_away ?? '-' }}
                                                @else
                                                    {{ $schedule->title ?? '-' }}
                                                @endif
                                                @if($schedule->status)
                                                    <span class="status-pill {{ $schedule->status === 'live' ? 'live' : '' }}">
                                                        {{ strtoupper($schedule->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $schedule->location ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada jadwal.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-muted small">Filter akan menampilkan jadwal sesuai cabang olahraga.</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-clean mb-4" id="live-score">
                        <div class="pill-tag">Live Score</div>
                        <h3 class="section-title">Pertandingan Berlangsung</h3>
                        @forelse($liveMatches as $live)
                            <div class="score-card mb-3">
                                <span class="live-badge">LIVE</span>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-bold">{{ $live->team_home ?? $live->title ?? 'Tim A' }}</div>
                                        <div class="text-white-50 small">{{ $live->sport->name ?? '-' }}</div>
                                    </div>
                                    <div class="display-6 fw-bold">{{ $live->score_home ?? 0 }}</div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div>
                                        <div class="fw-bold">{{ $live->team_away ?? 'Tim B' }}</div>
                                        <div class="text-white-50 small">{{ $live->match_date ? $live->match_date->translatedFormat('d M Y H:i') : '-' }}</div>
                                    </div>
                                    <div class="display-6 fw-bold">{{ $live->score_away ?? 0 }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-muted small">Belum ada pertandingan live.</div>
                        @endforelse
                        <div class="text-muted small mt-3">Live score tampil otomatis saat pertandingan aktif.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-4" id="statistik">
        <div class="container">
            <div class="card-clean">
                <div class="pill-tag">Statistik Program</div>
                <h3 class="section-title">Ringkasan Kegiatan</h3>
                @if($landingStats->count() > 0)
                    <div class="timeline mt-3">
                        @foreach($landingStats as $stat)
                            <div class="timeline-item">
                                <h6>
                                    {{ $stat->title }}
                                    @if($stat->log_date)
                                        <span class="text-muted small">· {{ $stat->log_date->translatedFormat('d M Y') }}</span>
                                    @endif
                                </h6>
                                <div class="text-muted small">{{ $stat->description ?? 'Penjelasan program akan diperbarui oleh admin.' }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-muted small">Belum ada program yang ditampilkan.</div>
                @endif
                <div class="text-muted small mt-3">Daftar program dan penjelasan diperbarui oleh admin.</div>
            </div>
        </div>
    </section>

    <section class="section pt-0" id="faq">
        <div class="container">
            <div class="card-clean">
                <div class="pill-tag">FAQ</div>
                <h3 class="section-title">Pertanyaan Umum</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h6>Siapa yang bisa mendaftar sebagai peserta?</h6>
                        <div class="text-muted small">Anak dan remaja di wilayah sasaran program yang sudah terdata oleh tim pendamping.</div>
                    </div>
                    <div class="timeline-item">
                        <h6>Bagaimana cara melihat jadwal latihan?</h6>
                        <div class="text-muted small">Lihat bagian Jadwal Pertandingan dan gunakan filter cabang olahraga.</div>
                    </div>
                    <div class="timeline-item">
                        <h6>Apakah kegiatan ini gratis?</h6>
                        <div class="text-muted small">Ya, seluruh rangkaian kegiatan difasilitasi oleh program.</div>
                    </div>
                    <div class="timeline-item">
                        <h6>Siapa yang dapat saya hubungi?</h6>
                        <div class="text-muted small">Silakan hubungi admin melalui kontak resmi di bagian atas landing page.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-0" id="olahraga">
        <div class="container">
            <div class="card-clean">
                <div class="pill-tag">Cabang Olahraga</div>
                <h3 class="section-title">Daftar Olahraga Dipertandingkan</h3>
                <div class="d-flex flex-wrap gap-2">
                    @forelse($sports as $sport)
                        <span class="filter-chip {{ (int) $sportId === $sport->id ? 'active' : '' }}">{{ $sport->name }}</span>
                    @empty
                        <span class="text-muted">Belum ada cabang olahraga.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    // Filter cabang tanpa reload; kalau gagal, jatuh kembali ke navigasi link biasa.
    (() => {
        const regions = ['#tanggal-kegiatan', '#jadwal', '#olahraga'];
        let controller = null;

        const applyFilter = async (url, pushHistory) => {
            controller?.abort();
            controller = new AbortController();

            try {
                const response = await fetch(url, { signal: controller.signal });
                if (!response.ok || response.redirected) {
                    window.location.href = url;
                    return;
                }

                const page = new DOMParser().parseFromString(await response.text(), 'text/html');
                regions.forEach(selector => {
                    const current = document.querySelector(selector);
                    const next = page.querySelector(selector);
                    if (current && next) {
                        current.replaceWith(next);
                    }
                });

                if (pushHistory && url !== window.location.href) {
                    history.pushState(null, '', url);
                }

                [...document.querySelectorAll('#jadwal .filter-chip')]
                    .find(chip => chip.href === url)
                    ?.focus({ preventScroll: true });
            } catch (error) {
                if (error.name !== 'AbortError') {
                    window.location.href = url;
                }
            }
        };

        document.addEventListener('click', event => {
            const link = event.target.closest('[data-sport-filter]');
            if (!link || event.ctrlKey || event.metaKey || event.shiftKey || event.button !== 0) {
                return;
            }

            event.preventDefault();
            applyFilter(link.href, true);
        });

        window.addEventListener('popstate', () => applyFilter(window.location.href, false));
    })();
</script>
@endsection
