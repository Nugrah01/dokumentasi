@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('kategori/style.css') }}">

<div class="dash-layout">

    @include('partials.sidebar-admin')
    @include('partials.topbar-admin')

    <div class="main-content">
        <div class="content-wrapper">

            <div class="page-header">
                <h2>Edit Kategori</h2>
            </div>

            <div class="card p-4">

                <form id="form-kategori-edit" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="bagian_id">Halaman Terkait</label>
                        <div class="select-wrapper">
                            <select name="bagian_id" class="form-control">
                                <option value="">--Pilih Halaman--</option>
                                @foreach($bagian as $b)
                                    <option value="{{ $b->id }}" {{ $b->id == $kategori->bagian_id ? 'selected' : '' }}>
                                        {{ $b->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul Kategori</label>
                        <input type="text"
                               name="judul"
                               id="judul"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul', $kategori->judul) }}"
                               required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions mt-4">
                        <button type="submit" class="btn btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Update Kategori
                        </button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
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

document.getElementById('form-kategori-edit').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form      = this;
    const submitBtn = form.querySelector('[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.style.opacity = '0.6';
    submitBtn.style.cursor  = 'not-allowed';

    const formData  = new FormData(form);
    const actionUrl = form.getAttribute('action');
    formData.append('_method', 'PUT');

    try {
        const response = await fetch(actionUrl, {
            method  : 'POST',
            headers : { 'X-CSRF-TOKEN' : '{{ csrf_token() }}', 'Accept' : 'application/json' },
            body: formData
        });

        const data = await response.json().catch(() => null);

        if (response.ok) {
            pushNotifToStorage('Kategori berhasil diperbarui', 'edit');
            window.location.href = "{{ route('kategori.index') }}";
        } else {
            submitBtn.disabled = false;
            submitBtn.style.opacity = '';
            submitBtn.style.cursor  = '';
            const msg = data?.message || 'Gagal memperbarui kategori';
            pushNotifToStorage(msg, 'danger');
            if (typeof showToast === 'function') showToast(msg, 'danger');
        }

    } catch (error) {
        console.error('Error:', error);
        submitBtn.disabled = false;
        submitBtn.style.opacity = '';
        submitBtn.style.cursor  = '';
        if (typeof showToast === 'function') showToast('Terjadi kesalahan saat memperbarui', 'danger');
    }
});
</script>

@endsection