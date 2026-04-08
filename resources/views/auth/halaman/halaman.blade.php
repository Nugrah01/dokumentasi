@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('halaman/halaman.css') }}">


<div class="dash-layout">

    {{-- ══ SIDEBAR ══ --}}
    @include('partials.sidebar-admin')

    {{-- ══ TOPBAR ══ --}}
    @include('partials.topbar-admin')

    <div class="main-content">

        <div class="content-wrapper">

            <div class="page-header">
                <h2>Manajemen Halaman</h2>
                <a href="{{ route('halaman.create') }}" class="btn btn-primary">
                    + Tambah Halaman
                </a>
            </div>

            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Halaman</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td>{{ $item->kategori->bagian->judul ?? '-' }}</td>
                                <td>{{ $item->kategori->judul ?? '-' }}</td>
                                <td>{{ Str::limit($item->deskripsi, 80) }}</td>
                                <td class="action-buttons">

                                    <a href="{{ route('halaman.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    {{-- Hapus via JS (tanpa redirect, pakai toast) --}}
                                    <button type="button"
                                            class="btn btn-sm btn-danger"
                                            onclick="hapusHalaman({{ $item->id }}, this)">
                                        Hapus
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data belum tersedia</td>
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

// ── Hapus Halaman via fetch (tanpa redirect) ──
async function hapusHalaman(id, btn) {
    if (!confirm('Yakin hapus data ini?')) return;

    try {
        const response = await fetch(`/auth/halaman/${id}`, {
            method  : 'POST',
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                'Accept'       : 'application/json',
                'Content-Type' : 'application/x-www-form-urlencoded',
            },
            body: '_method=DELETE'
        });

        if (response.ok || response.redirected) {
            // Hapus baris dari tabel
            const row = btn.closest('tr');
            if (row) row.remove();

            // Tampilkan toast & simpan ke bell
            pushNotifToStorage('Dokumentasi berhasil dihapus', 'danger');
            if (typeof showToast === 'function') showToast('Dokumentasi berhasil dihapus', 'danger');
        } else {
            pushNotifToStorage('Gagal menghapus dokumentasi', 'danger');
            if (typeof showToast === 'function') showToast('Gagal menghapus dokumentasi', 'danger');
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