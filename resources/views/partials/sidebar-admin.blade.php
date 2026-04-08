{{--
| PARTIAL: sidebar-admin.blade.php
| Penggunaan: @include('partials.sidebar-admin')
--}}

<link rel="stylesheet" href="{{ asset('style.css') }}">
{{-- Backdrop --}}
<div class="backdrop" id="backdrop" onclick="closeSidebar()"></div>

<aside class="sidebar" id="sidebar">
    <a href="#" class="sidebar-brand">
        <img class="img" src="{{ asset('media/logo.png') }}" alt="Logo SMART JMP">
        <div class="brand-text">
            <div class="brand-name">SMART JMP</div>
            <div class="brand-sub">Administrator</div>
        </div>
        <button class="sidebar-close" onclick="closeSidebar()" aria-label="Tutup menu">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </a>

    <div class="sidebar-section">
        <div class="section-label">Menu</div>

        <a href="{{ route('auth.dashboard') }}" class="nav-item {{ request()->routeIs('auth.dashboard') ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('halaman.index') }}" class="nav-item {{ request()->routeIs('halaman*') ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
            </svg>
            Halaman
        </a>

        <a href="{{ route('kategori.index') }}" class="nav-item {{ request()->routeIs('kategori*') ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M4 6h16M4 12h16M4 18h7"/>
            </svg>
            Kategori
        </a>
    </div>
</aside>

<script>
    function toggleDropdown() {
        document.getElementById('userDropdown').classList.toggle('open');
    }
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const dd = document.getElementById('userDropdown');
        if (dd && !dd.contains(e.target)) dd.classList.remove('open');
    });

    function openSidebar() {
        document.getElementById('sidebar').classList.add('open');
        document.getElementById('backdrop').classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('backdrop').classList.remove('show');
        document.body.style.overflow = '';
    }
    // Close on nav click (mobile)
    document.querySelectorAll('.nav-item').forEach(function(el) {
        el.addEventListener('click', function() {
            if (window.innerWidth <= 768) closeSidebar();
        });
    });
</script>