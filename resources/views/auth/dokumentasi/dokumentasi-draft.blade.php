@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('halaman/style.css') }}">
<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="dash-layout">

    @include('partials.sidebar-admin')
    @include('partials.topbar-admin')

    <div class="main-content">
        <main class="page-body">

            {{-- Banner Header --}}
            <div class="page-banner">
                <div class="page-banner-left">
                    <div class="page-banner-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="page-banner-title">Detail Dokumentasi</h2>
                        <p class="page-banner-sub">Informasi lengkap mengenai dokumentasi yang dipilih.</p>
                    </div>
                </div>
                <div class="action-group">
                    <a href="{{ route('auth.dashboard') }}" class="btn-batal">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            {{-- Detail Card --}}
            <div class="form-card">

                {{-- Info Rows --}}
                <div class="detail-table">

                    <div class="detail-row">
                        @foreach ($halaman as $halaman)
                            
                        <span class="detail-label">ID</span>
                        <span class="detail-value"># {{ $halaman->id }}</span>
                        @endforeach
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Kategori</span>
                        <span class="detail-value">{{ $halaman->kategori->judul ?? '-' }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Deskripsi</span>
                        <span class="detail-value">{{ $halaman->deskripsi }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Status</span>
                        <span class="detail-value">
                            <span class="status-badge status-{{ $halaman->status }}">
                                {{ ucfirst($halaman->status) }}
                            </span>
                        </span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Dibuat</span>
                        <span class="detail-value">{{ $halaman->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Update Terakhir</span>
                        <span class="detail-value">{{ $halaman->updated_at->format('d M Y, H:i') }}</span>
                    </div>

                </div>

                {{-- Jawaban --}}
                <div class="field-group" style="margin-top: 1.5rem;">
                    <label class="field-label">Jawaban</label>
                    <div class="detail-jawaban">
                        {!! $halaman->jawaban !!}
                    </div>
                </div>

            </div>

            {{-- Bagian Dokumentasi --}}
            @if($halaman->bagian && $halaman->bagian->count())
            <div class="form-card" style="margin-top: 1.5rem;">
                <div class="field-group">
                    <label class="field-label">Bagian Dokumentasi</label>
                </div>

                @foreach($halaman->bagian as $bagian)
                <div class="bagian-item">
                    <div class="bagian-item-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h10"/>
                        </svg>
                        {{ $bagian->judul }}
                    </div>
                    @if($bagian->deskripsi)
                    <p class="bagian-item-desc">{{ $bagian->deskripsi }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endif

        </main>
    </div>
</div>

<style>
/* ── Detail Table ── */
.detail-table {
    display: flex;
    flex-direction: column;
    gap: 0;
    border: 1px solid var(--border, #e5e7eb);
    border-radius: 8px;
    overflow: hidden;
}

.detail-row {
    display: grid;
    grid-template-columns: 180px 1fr;
    align-items: start;
    border-bottom: 1px solid var(--border, #e5e7eb);
    transition: background 0.15s;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-row:hover {
    background: var(--row-hover, #f9fafb);
}

.detail-label {
    padding: 0.85rem 1.25rem;
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--text-muted, #6b7280);
    background: var(--label-bg, #f3f4f6);
    border-right: 1px solid var(--border, #e5e7eb);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.detail-value {
    padding: 0.85rem 1.25rem;
    font-size: 0.9rem;
    color: var(--text-main, #111827);
    line-height: 1.5;
}

/* ── Jawaban Content ── */
.detail-jawaban {
    background: var(--label-bg, #f9fafb);
    border: 1px solid var(--border, #e5e7eb);
    border-radius: 8px;
    padding: 1.25rem 1.5rem;
    font-size: 0.9rem;
    line-height: 1.7;
    color: var(--text-main, #1f2937);
    min-height: 80px;
    overflow: hidden;        /* tambah ini */
}

/* tambah rule baru ini */
.detail-jawaban img {
    max-width: 100%;
    height: auto;
    display: block;
    border-radius: 6px;
    margin: 0.5rem auto;
}
/* ── Status Badge ── */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.2rem 0.75rem;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 0.03em;
}

.status-badge.status-publish {
    background: #d1fae5;
    color: #065f46;
}

.status-badge.status-draft {
    background: #fef3c7;
    color: #92400e;
}

/* ── Jawaban Content ── */
.detail-jawaban {
    background: var(--label-bg, #f9fafb);
    border: 1px solid var(--border, #e5e7eb);
    border-radius: 8px;
    padding: 1.25rem 1.5rem;
    font-size: 0.9rem;
    line-height: 1.7;
    color: var(--text-main, #1f2937);
    min-height: 80px;
}

.detail-jawaban p { margin-bottom: 0.75rem; }
.detail-jawaban p:last-child { margin-bottom: 0; }
.detail-jawaban ul, .detail-jawaban ol { padding-left: 1.5rem; margin-bottom: 0.75rem; }
.detail-jawaban h2, .detail-jawaban h3, .detail-jawaban h4 {
    font-weight: 600;
    margin: 1rem 0 0.4rem;
}
.detail-jawaban table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0.75rem;
}
.detail-jawaban table td,
.detail-jawaban table th {
    border: 1px solid var(--border, #e5e7eb);
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
}

/* ── Bagian Item ── */
.bagian-item {
    border: 1px solid var(--border, #e5e7eb);
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 0.75rem;
}

.bagian-item:last-child {
    margin-bottom: 0;
}

.bagian-item-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: var(--label-bg, #f3f4f6);
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-main, #111827);
    border-bottom: 1px solid var(--border, #e5e7eb);
}

.bagian-item-desc {
    padding: 0.75rem 1.25rem;
    font-size: 0.875rem;
    color: var(--text-muted, #6b7280);
    line-height: 1.6;
    margin: 0;
}
</style>

@endsection