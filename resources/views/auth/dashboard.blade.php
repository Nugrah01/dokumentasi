@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="dash-layout">

    @include('partials.sidebar-admin')
    @include('partials.topbar-admin')

    <main class="main-content">

        {{-- Hero --}}
        <div class="hero-banner">
            <div>
                <div class="hero-greeting">Hai Admin!</div>
                <div class="hero-title">Semua Dokumentasi di<br>Satu Tempat</div>
            </div>
            <a href="{{ route('halaman.create') }}" class="btn-new-doc">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Buat Dokument Baru
            </a>
        </div>

        {{-- Stats --}}
        <div class="stat-grid">

            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/>
                        <path d="M10 11v6M14 11v6M9 6V4h6v2"/>
                    </svg>
                </div>
                <div class="stat-number">{{ $totalDelete ?? 0 }}</div>
                <div class="stat-label">Total Dokumentasi<br>Yang Telah Dihapus</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                    </svg>
                </div>
                <div class="stat-number">{{ $totalDraft ?? 0 }}</div>
                <div class="stat-label">Total Dokumentasi<br>Yang Telah Dalam Draft</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <polyline points="9 11 12 14 22 4"/>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                    </svg>
                </div>
                <div class="stat-number">{{ $totalDipublish ?? 0 }}</div>
                <div class="stat-label">Total Dokumentasi<br>Yang Telah DiPublish</div>
            </div>

        </div>

        {{-- Filter Buttons --}}
        <div class="action-row">

            <button class="btn-action filter-btn" data-status="delete" data-color="red">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/>
                    <path d="M10 11v6M14 11v6M9 6V4h6v2"/>
                </svg>
                Dihapus
            </button>

            <button class="btn-action filter-btn" data-status="draft" data-color="orange">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                </svg>
                Diarsipkan
            </button>

            <button class="btn-action filter-btn" data-status="publish" data-color="green">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <polyline points="9 11 12 14 22 4"/>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                </svg>
                Dipublish
            </button>

        </div>

        {{-- Doc List --}}
        <div id="document-list" class="doc-list">
            @forelse($dokumens as $doc)
            @php
                $iconColor = match($doc->status) {
                    'publish' => 'green',
                    'draft'   => 'orange',
                    'delete'  => 'red',
                    default   => 'green',
                };
            @endphp
            <a href="{{ route('dokumentasi.show', $doc->id) }}" class="doc-item">
                <div class="doc-icon {{ $iconColor }}">
                    @if($doc->status === 'publish')
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <polyline points="9 11 12 14 22 4"/>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                        </svg>
                    @elseif($doc->status === 'draft')
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                    @else
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/>
                            <path d="M10 11v6M14 11v6M9 6V4h6v2"/>
                        </svg>
                    @endif
                </div>
                <div class="doc-info">
                    <div class="doc-title">{{ $doc->judul ?? $doc->deskripsi }}</div>
                    <div class="doc-desc">{{ $doc->deskripsi }}</div>
                </div>
                <span class="doc-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
            </a>
            @empty
            <p class="doc-empty">Tidak ada dokumentasi</p>
            @endforelse
        </div>

    </main>
</div>

<style>
/* ── Filter Button Active States ── */
.filter-btn {
    transition: background-color 0.2s ease, transform 0.1s ease;
}
.filter-btn.active-red {
    background-color: #ef4444 !important;
    color: #fff !important;
}
.filter-btn.active-orange {
    background-color: #f97316 !important;
    color: #fff !important;
}
.filter-btn.active-green {
    background-color: #22c55e !important;
    color: #fff !important;
}
.filter-btn:active {
    transform: scale(0.97);
}

/* ── Doc List ── */
.doc-empty {
    text-align: center;
    color: #94a3b8;
    padding: 2rem;
}
.doc-card-icon.red   { background-color: #fee2e2; color: #ef4444; }
.doc-card-icon.orange { background-color: #ffedd5; color: #f97316; }
.doc-card-icon.green { background-color: #dcfce7; color: #22c55e; }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const buttons   = document.querySelectorAll(".filter-btn");
    const container = document.getElementById("document-list");

    // Konfigurasi warna & ikon per status
    const config = {
        publish: {
            colorClass : "green",
            icon       : `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>`,
            route      : (id) => `/dokumentasi/dokumentasi/${id}`
        },
        draft: {
            colorClass : "orange",
            icon       : `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>`,
            route      : () => `/dokumentasi/draft`
        },
        delete: {
            colorClass : "red",
            icon       : `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6M9 6V4h6v2"/></svg>`,
            route      : () => `/dokumentasi/delete`
        }
    };

    // Simpan HTML default (dari server) untuk dikembalikan saat toggle off
    const defaultHTML = container.innerHTML;

    // Simpan status aktif (null = tidak ada yang aktif)
    let activeStatus = null;

    async function loadDocuments(status) {
        container.innerHTML = `<p class="doc-empty">Memuat...</p>`;
        try {
            const res    = await fetch(`/auth/dokumentasi/filter/${status}`);
            const result = await res.json();
            renderDocuments(result.data, status);
        } catch (err) {
            console.error("Gagal memuat data:", err);
            container.innerHTML = `<p class="doc-empty">Gagal memuat data.</p>`;
        }
    }

    function renderDocuments(documents, status) {
        container.innerHTML = "";

        if (!documents || documents.length === 0) {
            container.innerHTML = `<p class="doc-empty">Tidak ada dokumentasi dengan status ini.</p>`;
            return;
        }

        const { colorClass, icon, route } = config[status];

        documents.forEach(doc => {
            const href  = route(doc.id);
            const title = doc.judul || doc.deskripsi || "Tanpa Judul";
            const desc  = doc.deskripsi || "";

            const item  = document.createElement("a");
            item.href   = href;
            item.classList.add("doc-item");
            item.innerHTML = `
                <div class="doc-icon ${colorClass}">${icon}</div>
                <div class="doc-info">
                    <div class="doc-title">${title}</div>
                    <div class="doc-desc">${desc}</div>
                </div>
                <span class="doc-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
            `;
            container.appendChild(item);
        });
    }

    function resetAllButtons() {
        buttons.forEach(b => {
            b.classList.remove("active-red", "active-orange", "active-green");
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            const status     = btn.dataset.status;
            const colorClass = `active-${btn.dataset.color}`;

            // Toggle: kalau tombol ini sudah aktif → nonaktifkan & kembalikan list awal
            if (activeStatus === status) {
                activeStatus = null;
                resetAllButtons();
                container.innerHTML = defaultHTML;
                return;
            }

            // Aktifkan tombol ini, nonaktifkan yang lain
            activeStatus = status;
            resetAllButtons();
            btn.classList.add(colorClass);

            loadDocuments(status);
        });
    });

});
</script>

@endsection