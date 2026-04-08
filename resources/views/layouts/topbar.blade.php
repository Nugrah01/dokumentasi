<link rel="stylesheet" href="{{ asset('layouts/topbar.css') }}">
{{-- ══ TOPBAR ══ --}}
    <header class="topbar">
        <button class="hamburger" onclick="openSidebar()" aria-label="Buka menu">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        <div class="topbar-title">Selamat&nbsp;Datang&nbsp;DI&nbsp;SMARTJMP</div>
        <a href="{{ route('login') }}" class="topbar-user">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.2"
                 stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <span class="user-label">Login Admin</span>
        </a>
    </header>

    {{-- ═══════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════ --}}
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