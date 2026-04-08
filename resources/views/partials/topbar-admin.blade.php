{{--
| PARTIAL: topbar-admin.blade.php
| Penggunaan: @include('partials.topbar-admin')
--}}

<link rel="stylesheet" href="{{ asset('style.css') }}">
<header class="topbar">
    <button class="hamburger" onclick="openSidebar()" aria-label="Buka menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <line x1="3" y1="6" x2="21" y2="6"/>
            <line x1="3" y1="12" x2="21" y2="12"/>
            <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
    </button>

    <div class="topbar-title">Selamat&nbsp;Datang&nbsp;Di&nbsp;Admin&nbsp;SMART JMP</div>

    <div class="topbar-right">

        {{-- User Dropdown --}}
        <div class="user-dropdown" id="userDropdown">
            <button class="topbar-user" onclick="toggleDropdown()" aria-label="Menu pengguna">
                <div class="user-avatar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <span class="user-chevron">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </span>
            </button>

            <div class="dropdown-menu">
                <div class="dropdown-header">
                    <div class="d-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="d-role">Administrator</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item danger">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Notifikasi Bell --}}
        <div class="notif-wrapper" id="notifWrapper">
            <button class="notif-btn" id="notifBtn" onclick="toggleNotif()" aria-label="Notifikasi">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
                <span class="notif-badge" id="notifBadge" style="display:none;"></span>
            </button>

            {{-- Dropdown Notifikasi --}}
            <div class="notif-dropdown" id="notifDropdown">
                <div class="notif-dropdown-header">
                    <span>Notifikasi</span>
                    <button class="notif-clear-all" onclick="clearAllNotif()">Hapus semua</button>
                </div>
                <div class="notif-list" id="notifList">
                    <div class="notif-empty">Tidak ada notifikasi</div>
                </div>
            </div>
        </div>

    </div>
</header>



<style>
/* ── Notif Wrapper ── */
.notif-wrapper {
    position: relative;
}

.notif-btn {
    position: relative;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: inherit;
    transition: background 0.15s;
}
.notif-btn:hover {
    background: rgba(0,0,0,0.06);
}

.notif-badge {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 8px;
    height: 8px;
    background: #ef4444;
    border-radius: 50%;
    border: 1.5px solid #fff;
}

/* ── Notif Dropdown ── */
.notif-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    width: 300px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    z-index: 999;
    overflow: hidden;
}
.notif-dropdown.open {
    display: block;
}

.notif-dropdown-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 1px solid #f1f5f9;
}

.notif-clear-all {
    background: none;
    border: none;
    font-size: 0.75rem;
    color: #94a3b8;
    cursor: pointer;
    padding: 0;
}
.notif-clear-all:hover {
    color: #ef4444;
}

.notif-list {
    max-height: 280px;
    overflow-y: auto;
}

.notif-empty {
    text-align: center;
    color: #94a3b8;
    font-size: 0.8rem;
    padding: 1.5rem;
}

/* ── Notif Item ── */
.notif-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #f8fafc;
    transition: background 0.15s;
}
.notif-item:last-child {
    border-bottom: none;
}
.notif-item:hover {
    background: #f8fafc;
}

.notif-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.notif-icon.success { background: #dcfce7; color: #16a34a; }
.notif-icon.danger  { background: #fee2e2; color: #dc2626; }
.notif-icon.edit    { background: #dbeafe; color: #2563eb; }
.notif-icon.info    { background: #dbeafe; color: #2563eb; }

.notif-text {
    flex: 1;
}
.notif-msg {
    font-size: 0.82rem;
    color: #1e293b;
    line-height: 1.4;
}
.notif-time {
    font-size: 0.72rem;
    color: #94a3b8;
    margin-top: 2px;
}

.notif-remove {
    background: none;
    border: none;
    cursor: pointer;
    color: #cbd5e1;
    padding: 0;
    font-size: 1rem;
    line-height: 1;
    flex-shrink: 0;
}
.notif-remove:hover {
    color: #ef4444;
}

@keyframes toastIn {
    from { opacity: 0; transform: translateX(40px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes toastOut {
    from { opacity: 1; transform: translateX(0); }
    to   { opacity: 0; transform: translateX(40px); }
}
</style>

<script>
// ── Notifikasi System ──

function getNotifs() {
    return JSON.parse(sessionStorage.getItem('admin_notifs') || '[]');
}

function saveNotifs(notifs) {
    sessionStorage.setItem('admin_notifs', JSON.stringify(notifs));
}

function addNotification(message, type = 'info') {
    const notifs = getNotifs();
    notifs.unshift({
        id   : Date.now(),
        msg  : message,
        type : type,
        time : new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
    });
    saveNotifs(notifs);
    renderNotifs();
}

function removeNotif(id) {
    const notifs = getNotifs().filter(n => n.id !== id);
    saveNotifs(notifs);
    renderNotifs();
}

function clearAllNotif() {
    saveNotifs([]);
    renderNotifs();
}

function renderNotifs() {
    const notifs = getNotifs();
    const list   = document.getElementById('notifList');
    const badge  = document.getElementById('notifBadge');

    if (!list) return;

    if (notifs.length === 0) {
        list.innerHTML = '<div class="notif-empty">Tidak ada notifikasi</div>';
        badge.style.display = 'none';
        return;
    }

    badge.style.display = 'block';
    badge.textContent   = notifs.length > 9 ? '9+' : notifs.length;

    const iconMap = {
        success : `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>`,
        danger  : `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6M9 6V4h6v2"/></svg>`,
        edit    : `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>`,
        info    : `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>`
    };

    list.innerHTML = notifs.map(n => `
        <div class="notif-item">
            <div class="notif-icon ${n.type}">${iconMap[n.type] || iconMap.info}</div>
            <div class="notif-text">
                <div class="notif-msg">${n.msg}</div>
                <div class="notif-time">${n.time}</div>
            </div>
            <button class="notif-remove" onclick="removeNotif(${n.id})" title="Hapus">×</button>
        </div>
    `).join('');
}

function toggleNotif() {
    const dd = document.getElementById('notifDropdown');
    dd.classList.toggle('open');
    // tutup user dropdown kalau terbuka
    document.getElementById('userDropdown')?.classList.remove('open');
}

// Tutup notif dropdown kalau klik di luar
document.addEventListener('click', function(e) {
    const wrapper = document.getElementById('notifWrapper');
    if (wrapper && !wrapper.contains(e.target)) {
        document.getElementById('notifDropdown')?.classList.remove('open');
    }
});

// ── Toast System ──
function showToast(message, type = 'success') {
    const colors = {
        success : { bg: '#22c55e', icon: `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>` },
        danger  : { bg: '#ef4444', icon: `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6M9 6V4h6v2"/></svg>` },
        edit    : { bg: '#3b82f6', icon: `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>` },
        info    : { bg: '#3b82f6', icon: `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>` },
    };
    const { bg, icon } = colors[type] || colors.info;
    const toast = document.createElement('div');
    toast.style.cssText = `
        position:fixed;top:80px;right:24px;z-index:9999;
        display:flex;align-items:center;gap:10px;
        background:#fff;border-radius:12px;
        box-shadow:0 8px 24px rgba(0,0,0,0.13);
        padding:14px 18px;min-width:260px;max-width:360px;
        border-left:4px solid ${bg};
        animation:toastIn 0.3s ease;cursor:pointer;
    `;
    toast.innerHTML = `
        <div style="width:32px;height:32px;border-radius:50%;background:${bg}20;color:${bg};display:flex;align-items:center;justify-content:center;flex-shrink:0;">${icon}</div>
        <div style="flex:1;font-size:0.85rem;color:#1e293b;line-height:1.4;">${message}</div>
        <div style="color:#cbd5e1;font-size:1.1rem;flex-shrink:0;">×</div>
    `;
    toast.addEventListener('click', () => dismissToast(toast));
    document.body.appendChild(toast);
    setTimeout(() => dismissToast(toast), 4000);
}

function dismissToast(toast) {
    if (!toast || !toast.parentNode) return;
    toast.style.animation = 'toastOut 0.3s ease forwards';
    setTimeout(() => toast.remove(), 280);
}

// ── Render saat halaman load + tampilkan toast jika ada notif pending ──
document.addEventListener('DOMContentLoaded', function() {
    renderNotifs();
    const pending = sessionStorage.getItem('admin_notif_pending');
    if (pending) {
        sessionStorage.removeItem('admin_notif_pending');
        try {
            const { message, type } = JSON.parse(pending);
            setTimeout(() => showToast(message, type), 300);
        } catch(e) {}
    }

    @if(session('notif_toast'))
    setTimeout(() => {
        const t = @json(session('notif_toast'));
        try {
            const { message, type } = JSON.parse(t);
            const notifs = JSON.parse(sessionStorage.getItem('admin_notifs') || '[]');
            notifs.unshift({ id: Date.now(), msg: message, type, time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) });
            sessionStorage.setItem('admin_notifs', JSON.stringify(notifs));
            renderNotifs();
            showToast(message, type);
        } catch(e) {}
    }, 300);
    @endif
});

// ── Expose global supaya bisa dipanggil dari halaman lain ──
window.addNotification = addNotification;

// ── User Dropdown ──
function toggleDropdown() {
    document.getElementById('userDropdown').classList.toggle('open');
    document.getElementById('notifDropdown')?.classList.remove('open');
}
document.addEventListener('click', function(e) {
    const dd = document.getElementById('userDropdown');
    if (dd && !dd.contains(e.target)) dd.classList.remove('open');
});

// ── Sidebar ──
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
document.querySelectorAll('.nav-item').forEach(function(el) {
    el.addEventListener('click', function() {
        if (window.innerWidth <= 768) closeSidebar();
    });
});
</script>