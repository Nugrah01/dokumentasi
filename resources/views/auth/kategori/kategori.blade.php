@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('kategori/kategori.css') }}">

<div class="dash-layout">

    @include('partials.sidebar-admin')
    @include('partials.topbar-admin')

    <div class="main-content">
        <div class="content-wrapper">

            {{-- Page Header --}}
            <div class="page-header">
                <div class="page-header-left">
                    <h2 class="page-title">Manajemen Kategori</h2>
                    <p class="page-subtitle">Kelola semua kategori konten di sini</p>
                </div>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                    + Tambah Kategori
                </a>
            </div>

            {{-- Table Card --}}
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td>{{ $item->judul }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <button type="button"
                                            class="btn btn-sm btn-danger"
                                            onclick="hapusKategori({{ $item->id }}, this)">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Data kategori belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    {{ $data->links() }}
                </div>
            </div>

        </div>
    </div>

</div>

<script>
// ── Helper push notif ke sessionStorage (untuk bell + toast) ──
function pushNotifToStorage(message, type) {
    const notifs = JSON.parse(sessionStorage.getItem('admin_notifs') || '[]');
    notifs.unshift({
        id   : Date.now(),
        msg  : message,
        type : type,
        time : new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
    });
    sessionStorage.setItem('admin_notifs', JSON.stringify(notifs));
    if (typeof renderNotifs === 'function') renderNotifs();
}

// ── Hapus Kategori via fetch ──
async function hapusKategori(id, btn) {
    if (!confirm('Yakin ingin menghapus kategori ini?')) return;

    try {
        const response = await fetch(`/auth/kategori/${id}`, {
            method  : 'POST',
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                'Accept'       : 'application/json',
                'Content-Type' : 'application/x-www-form-urlencoded',
            },
            body: '_method=DELETE'
        });

        const data = await response.json().catch(() => null);

        if (response.ok) {
            // Hapus baris dari tabel
            const row = btn.closest('tr');
            if (row) row.remove();

            pushNotifToStorage('Kategori berhasil dihapus', 'danger');
            if (typeof showToast === 'function') showToast('Kategori berhasil dihapus', 'danger');

        } else {
            // Cek apakah ada pesan error dari controller (masih digunakan)
            const msg = data?.message || 'Gagal menghapus kategori';
            pushNotifToStorage(msg, 'danger');
            if (typeof showToast === 'function') showToast(msg, 'danger');
        }

    } catch (error) {
        console.error('Error:', error);
        if (typeof showToast === 'function') showToast('Terjadi kesalahan saat menghapus', 'danger');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    function toggleDropdown() {
        document.getElementById('userDropdown').classList.toggle('open');
    }
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
    document.querySelectorAll('.nav-item').forEach(function(el) {
        el.addEventListener('click', function() {
            if (window.innerWidth <= 768) closeSidebar();
        });
    });
});
</script>

@endsection