{{--
| PARTIAL: sidebar.blade.php
| Penggunaan: @include('layouts.sidebar')
--}}

<link rel="stylesheet" href="{{ asset('layouts/sidebar.css') }}">

{{-- Backdrop mobile --}}
<div class="sidebar-backdrop" id="sidebarBackdrop" onclick="closeSidebar()"></div>

<aside class="sidebar" id="sidebar">

    {{-- Brand --}}
<a href="#" class="sidebar-brand">
    <img class="img" src="{{ asset('media/logo.png') }}" alt="Logo SMARTJMP">
    <div class="brand-name">SMART JMP</div>
    <button class="sidebar-close" onclick="closeSidebar()" aria-label="Tutup menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</a>

    {{-- Menu --}}
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu</div>
        @isset($bagian)
            @foreach($bagian as $b)

                {{-- Level 1: Bagian --}}
                <div class="nav-group">
                    <button class="nav-group-toggle" onclick="toggleNav(this)">
                        <div class="nav-folder-icon">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path d="M3 7v14h18V7H3zm0-3h18v2H3V4z"/>
                            </svg>
                        </div>
                        {{ $b->judul }}
                        <svg class="toggle-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </button>

                    {{-- Level 2: Kategori --}}
                    <div class="nav-sub">
                        @foreach($b->kategori ?? [] as $k)

                            <div class="nav-group">
                                <button class="nav-group-toggle" onclick="toggleNav(this)">
                                    <div class="nav-folder-icon">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <path d="M3 7v14h18V7H3zm0-3h18v2H3V4z"/>
                                        </svg>
                                    </div>
                                    {{ $k->judul }}
                                    <svg class="toggle-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <polyline points="9 18 15 12 9 6"/>
                                    </svg>
                                </button>

                                {{-- Level 3: Halaman --}}
                                <div class="nav-sub">
                                    @foreach(($k->halaman ?? collect())->where('status', 'publish') as $h)
                                        <a href="{{ route('halaman.show', $h->id) }}"
                                           class="nav-sub-item {{ request()->routeIs('halaman.show') && request()->route('halaman') == $h->id ? 'active' : '' }}">
                                            <div class="nav-file-icon">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                                </svg>
                                            </div>
                                            {{ $h->deskripsi }}
                                        </a>
                                    @endforeach
                                </div>

                            </div>

                        @endforeach
                    </div>

                </div>

            @endforeach
        @endisset
    </div>
</aside>

<script>
    function toggleNav(btn) {
        const sub = btn.nextElementSibling;
        const isOpen = btn.classList.contains('open');
        btn.classList.toggle('open', !isOpen);
        if (sub) sub.classList.toggle('open', !isOpen);
    }

    function openSidebar() {
        document.getElementById('sidebar').classList.add('mobile-open');
        document.getElementById('sidebarBackdrop').classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('mobile-open');
        document.getElementById('sidebarBackdrop').classList.remove('show');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.nav-sub-item').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth <= 768) closeSidebar();
        });
    });
</script>
