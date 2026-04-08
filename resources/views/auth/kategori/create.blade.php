@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('kategori/style.css') }}">

<div class="dash-layout">

    @include('partials.sidebar-admin')
    @include('partials.topbar-admin')

    <div class="main-content">
        <div class="content-wrapper">

            {{-- Banner Header --}}
            <div class="page-banner">
                <div class="page-banner-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h2 class="page-banner-title">Tambah Kategori Baru</h2>
                    <p class="page-banner-sub">Isi form di bawah untuk menambahkan kategori, serta cantumkan halaman terkait.</p>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="form-card">
                <form id="form-kategori" action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    {{-- Halaman --}}
                    <div class="form-group">
                        <label for="halaman">Halaman</label>
                        <div class="select-wrapper">
                            <select name="bagian_id" class="form-control">
                                <option value="">--Pilih Halaman--</option>
                                @foreach($bagian as $b)
                                    <option value="{{ $b->id }}">{{ $b->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Judul Kategori --}}
                    <div class="form-group">
                        <label for="judul">Kategori</label>
                        <input type="text"
                               name="judul"
                               id="judul"
                               placeholder="(Buat Kategori)"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul') }}"
                               required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="form-actions">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Simpan Kategori
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
function pushNotifToStorage(message, type) {
    const notifs = JSON.parse(sessionStorage.getItem('admin_notifs') || '[]');
    notifs.unshift({
        id   : Date.now(),
        msg  : message,
        type : type,
        time : new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
    });
    sessionStorage.setItem('admin_notifs', JSON.stringify(notifs));
    sessionStorage.setItem('admin_notif_pending', JSON.stringify({ message, type }));
}

document.getElementById('form-kategori').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form      = this;
    const submitBtn = form.querySelector('[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.style.opacity = '0.6';
    submitBtn.style.cursor  = 'not-allowed';

    const formData  = new FormData(form);
    const actionUrl = form.getAttribute('action');

    try {
        const response = await fetch(actionUrl, {
            method  : 'POST',
            headers : { 'X-CSRF-TOKEN' : '{{ csrf_token() }}', 'Accept' : 'application/json' },
            body: formData
        });

        const data = await response.json().catch(() => null);

        if (response.ok) {
            pushNotifToStorage('Kategori berhasil ditambahkan', 'success');
            window.location.href = "{{ route('kategori.index') }}";
        } else {
            submitBtn.disabled = false;
            submitBtn.style.opacity = '';
            submitBtn.style.cursor  = '';
            const msg = data?.message || 'Gagal menambahkan kategori';
            pushNotifToStorage(msg, 'danger');
            if (typeof showToast === 'function') showToast(msg, 'danger');
        }

    } catch (error) {
        console.error('Error:', error);
        submitBtn.disabled = false;
        submitBtn.style.opacity = '';
        submitBtn.style.cursor  = '';
        if (typeof showToast === 'function') showToast('Terjadi kesalahan saat menyimpan', 'danger');
    }
});
</script>

@endsection