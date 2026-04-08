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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="page-banner-title">Tambah Dokumentasi Baru Pada Halaman Yang Di Tentukan</h2>
                        <p class="page-banner-sub">Isi form dibawah untuk menambahkan dokumentasi, serta cantumkan halaman dan kategori.</p>
                    </div>
                </div>
                <button type="button" class="btn-fullscreen" id="btn-fullscreen">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                    </svg>
                    Fullscreen Editor
                </button>
            </div>

            {{-- Form Card --}}
            <div class="form-card">
                <form id="form-hal-doc" method="POST" action="{{ route('halaman.store') }}">
                    @csrf

                    {{-- Bagian --}}
                    <div class="field-group">
                        <label class="field-label">Bagian</label>
                        <select id="bagian-select" name="bagian_id" class="field-select" required>
                            <option value="">--Pilih Bagian--</option>
                            @foreach($bagian as $b)
                                <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kategori --}}
                    <div class="field-group">
                        <label class="field-label">Kategori</label>
                        <select id="kategori-select" name="kategori_id" class="field-select" required>
                            <option value="">--Pilih Kategori--</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="field-group">
                        <label class="field-label">Deskripsi Dokument</label>
                        <textarea
                            name="deskripsi"
                            class="field-textarea"
                            rows="3"
                            placeholder="Contoh: Dokument ini berisi tentang cara penggunaan item"
                            required></textarea>
                    </div>

                    {{-- Jawaban --}}
                    <div class="field-group">
                        <label class="field-label">Jawaban</label>
                        <textarea id="editor" name="jawaban"></textarea>
                    </div>

                    {{-- Footer: Status + Buttons --}}
                    <div class="form-footer">
                        <div class="status-group">
                            <label class="field-label">Status:</label>
                            <select name="status" class="field-select field-select-sm">
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>
                                <option value="delete">Deleted</option>
                            </select>
                        </div>
                        <div class="action-group">
                            <a href="{{ route('halaman.index') }}" class="btn-batal">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" class="btn-simpan">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                Simpan Halaman
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </main>
    </div>
</div>

{{-- Fullscreen Modal --}}
<div id="fs-overlay" class="fs-overlay" aria-hidden="true">
    <div class="fs-modal">
        <div class="fs-modal-header">
            <span class="fs-modal-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Editor Jawaban
            </span>
            <button type="button" class="fs-close" id="btn-fs-close" title="Tutup Fullscreen (Esc)">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Tutup
            </button>
        </div>
        <div class="fs-modal-body">
            <textarea id="editor-fs"></textarea>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
// ── Helper: simpan notif ke sessionStorage untuk bell + toast setelah redirect ──
function pushNotifToStorage(message, type) {
    // Untuk bell history
    const notifs = JSON.parse(sessionStorage.getItem('admin_notifs') || '[]');
    notifs.unshift({
        id   : Date.now(),
        msg  : message,
        type : type,
        time : new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
    });
    sessionStorage.setItem('admin_notifs', JSON.stringify(notifs));

    // Untuk toast otomatis setelah redirect
    sessionStorage.setItem('admin_notif_pending', JSON.stringify({ message, type }));
}

document.addEventListener("DOMContentLoaded", function () {

    let editorMain = null;
    let editorFs   = null;
    let fsOpen     = false;

    const overlay  = document.getElementById('fs-overlay');
    const btnOpen  = document.getElementById('btn-fullscreen');
    const btnClose = document.getElementById('btn-fs-close');

    const ckConfig = {
        ckfinder: { uploadUrl: "{{ route('editor.upload') }}?_token={{ csrf_token() }}" },
        toolbar: ['heading','|','bold','italic','link','bulletedList','numberedList','|','insertTable','uploadImage','blockQuote','undo','redo']
    };

    ClassicEditor.create(document.querySelector('#editor'), ckConfig)
        .then(editor => { editorMain = editor; })
        .catch(console.error);

    btnOpen.addEventListener('click', function () {
        if (fsOpen) return;
        fsOpen = true;
        const currentData = editorMain ? editorMain.getData() : '';
        overlay.classList.add('fs-active');
        document.body.style.overflow = 'hidden';
        ClassicEditor.create(document.querySelector('#editor-fs'), ckConfig)
            .then(editor => {
                editorFs = editor;
                editorFs.setData(currentData);
                setTimeout(() => editorFs.editing.view.focus(), 100);
            }).catch(console.error);
    });

    function closeFullscreen() {
        if (!fsOpen) return;
        if (editorFs && editorMain) editorMain.setData(editorFs.getData());
        if (editorFs) { editorFs.destroy().catch(console.error); editorFs = null; }
        overlay.classList.remove('fs-active');
        document.body.style.overflow = '';
        fsOpen = false;
    }

    btnClose.addEventListener('click', closeFullscreen);
    overlay.addEventListener('click', function (e) { if (e.target === overlay) closeFullscreen(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && fsOpen) closeFullscreen(); });

    // ── Submit Form ──
    const form = document.getElementById("form-hal-doc");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const submitBtn = form.querySelector('[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor  = 'not-allowed';

        const jawabanData = editorMain ? editorMain.getData() : '';
        if (!jawabanData.trim()) {
            alert("Kolom Jawaban tidak boleh kosong.");
            submitBtn.disabled = false;
            submitBtn.style.opacity = '';
            submitBtn.style.cursor  = '';
            return;
        }
        document.querySelector('#editor').value = jawabanData;

        const formData  = new FormData(form);
        const actionUrl = form.getAttribute("action");

        try {
            const response = await fetch(actionUrl, {
                method  : "POST",
                headers : { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Accept": "application/json" },
                body    : formData
            });

            let data;
            try { data = await response.json(); } catch {
                alert("Server mengembalikan response tidak valid");
                submitBtn.disabled = false;
                submitBtn.style.opacity = '';
                submitBtn.style.cursor  = '';
                return;
            }

            if (response.ok) {
                pushNotifToStorage('Dokumentasi berhasil ditambahkan', 'success');
                window.location.href = "{{ route('halaman.index') }}";
            } else {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '';
                submitBtn.style.cursor  = '';
                pushNotifToStorage('Gagal menambahkan dokumentasi', 'danger');
                if (data.errors) {
                    Object.keys(data.errors).forEach(key => console.error(key + ":", data.errors[key][0]));
                }
            }

        } catch (error) {
            console.error("Terjadi error:", error);
            submitBtn.disabled = false;
            submitBtn.style.opacity = '';
            submitBtn.style.cursor  = '';
            pushNotifToStorage('Terjadi kesalahan saat menambahkan data', 'danger');
        }
    });

});

// ── Dynamic Kategori by Bagian ──
document.addEventListener("DOMContentLoaded", function () {
    const bagianSelect   = document.getElementById("bagian-select");
    const kategoriSelect = document.getElementById("kategori-select");

    bagianSelect.addEventListener("change", async function () {
        const bagianId = this.value;
        kategoriSelect.innerHTML = '<option value="">Loading...</option>';
        if (!bagianId) { kategoriSelect.innerHTML = '<option value="">--Pilih Kategori--</option>'; return; }
        try {
            const response     = await fetch(`/auth/kategori/by-bagian/${bagianId}`);
            const kategoriList = await response.json();
            kategoriSelect.innerHTML = '<option value="">--Pilih Kategori--</option>';
            kategoriList.forEach(kategori => {
                const option       = document.createElement("option");
                option.value       = kategori.id;
                option.textContent = kategori.judul;
                kategoriSelect.appendChild(option);
            });
        } catch (error) {
            console.error("Gagal memuat kategori:", error);
            kategoriSelect.innerHTML = '<option value="">Gagal memuat kategori</option>';
        }
    });
});
</script>

@endsection