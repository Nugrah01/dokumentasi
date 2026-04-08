@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Baloo+2:wght@700;800&family=Fira+Code:wght@400;500&display=swap');

/* ═══════════════════════════════════════
   VARIABLES
═══════════════════════════════════════ */
:root {
    --teal:         #00bcd4;
    --teal-dark:    #00a5bb;
    --teal-light:   rgba(0, 188, 212, .12);
    --navy:         #0f1729;
    --sidebar-w:    240px;
    --topbar-h:     56px;
    --bg:           #eaf6f8;
    --white:        #ffffff;
    --text:         #1a202c;
    --muted:        #718096;
    --border:       #d0eef2;
    --code-bg:      #1a1a2e;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'Nunito', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
}

/* ═══════════════════════════════════════
   LAYOUT
═══════════════════════════════════════ */
.dash-layout { display: flex; min-height: 100vh; }

.main-content {
    margin-left: var(--sidebar-w);
    margin-top: var(--topbar-h);
    padding: 28px 32px;
    width: calc(100% - var(--sidebar-w));
    min-height: calc(100vh - var(--topbar-h));
    animation: fadeUp .45s ease both;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) { .main-content { margin-left: 0; width: 100%; padding: 20px 16px; } }
@media (max-width: 480px) { .main-content { padding: 16px 12px; } }

/* ═══════════════════════════════════════
   PAGE HEADING
═══════════════════════════════════════ */
.page-heading {
    font-size: 18px;
    font-weight: 800;
    color: var(--text);
    margin-bottom: 18px;
    letter-spacing: .5px;
}

/* ═══════════════════════════════════════
   DOC CARD
═══════════════════════════════════════ */
.doc-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-left: 4px solid var(--teal);
    border-radius: 12px;
    padding: 40px 48px;
    width: 100%;
    box-shadow: 0 2px 12px rgba(0, 188, 212, .08);
}

@media (max-width: 768px) { .doc-card { padding: 24px 20px; border-radius: 10px; } }
@media (max-width: 480px) { .doc-card { padding: 18px 14px; } }

/* ═══════════════════════════════════════
   MARKDOWN CONTENT
═══════════════════════════════════════ */
.md-content { line-height: 1.75; color: #2d3748; }

.md-content h1 {
    font-family: 'Baloo 2', cursive;
    font-size: 26px; font-weight: 800;
    text-align: center; color: var(--text);
    margin-bottom: 10px; letter-spacing: 1px;
}
@media (max-width: 480px) { .md-content h1 { font-size: 20px; } }

.md-content .doc-intro {
    text-align: center; color: var(--muted);
    font-size: 14px; margin-bottom: 28px; line-height: 1.6;
}
@media (max-width: 480px) { .md-content .doc-intro { font-size: 13px; } }

.md-content h2      { font-size: 17px; font-weight: 800; color: var(--text); margin: 24px 0 10px; }
.md-content h3      { font-size: 15px; font-weight: 700; color: var(--text); margin: 18px 0 8px; }
.md-content p       { font-size: 14px; margin-bottom: 10px; color: #4a5568; }
.md-content strong  { color: var(--text); font-weight: 700; }
.md-content a       { color: var(--teal); text-decoration: none; font-weight: 600; }
.md-content a:hover { text-decoration: underline; }

.md-content ul,
.md-content ol { padding-left: 20px; margin-bottom: 12px; }
.md-content li { font-size: 14px; margin-bottom: 5px; color: #4a5568; }

.md-content code {
    font-family: 'Fira Code', monospace;
    background: var(--teal-light);
    color: var(--teal-dark);
    padding: 2px 7px; border-radius: 5px;
    font-size: 12.5px; word-break: break-all;
}

.md-content pre {
    background: var(--code-bg); border-radius: 10px;
    padding: 16px 18px; overflow-x: auto; margin: 14px 0;
}
.md-content pre code {
    background: none; color: #abb2bf;
    font-size: 12px; padding: 0; word-break: normal;
}

.md-divider { border: none; border-top: 1px solid var(--border); margin: 24px 0; }

/* ═══════════════════════════════════════
   TWO-COLUMN GRID
═══════════════════════════════════════ */
.two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; margin: 24px 0; }
@media (max-width: 640px) { .two-col { grid-template-columns: 1fr; gap: 20px; } }

/* ═══════════════════════════════════════
   DOC IMAGE
═══════════════════════════════════════ */
.doc-img {
    width: 100%; border-radius: 10px; border: 1px solid var(--border);
    overflow: hidden; background: #f7fafc;
    display: flex; align-items: center; justify-content: center;
    min-height: 150px; color: var(--muted); font-size: 12px;
}
.doc-img img { width: 100%; height: auto; display: block; }

/* ═══════════════════════════════════════
   POSTMAN BAR
═══════════════════════════════════════ */
.postman-bar {
    background: #1a1a2e; border-radius: 10px;
    overflow: hidden; margin: 16px 0; border: 1px solid #2e2e50;
}

.postman-top {
    display: flex; align-items: stretch;
    border-bottom: 1px solid #2e2e50; overflow: hidden;
}

.postman-method {
    background: var(--teal); color: var(--navy);
    font-family: 'Fira Code', monospace;
    font-size: 12px; font-weight: 700;
    padding: 10px 14px;
    display: flex; align-items: center; flex-shrink: 0;
}

.postman-url {
    flex: 1; padding: 10px 14px; min-width: 0;
    font-family: 'Fira Code', monospace; font-size: 10.5px;
    color: #a0a8c0; overflow: hidden; white-space: nowrap;
    text-overflow: ellipsis; background: #1a1a2e;
}
.postman-url .url-env  { color: var(--teal); }
.postman-url .url-path { color: #abb2bf; }
@media (max-width: 480px) { .postman-url { font-size: 9.5px; padding: 10px 8px; } }

.postman-send {
    background: #e05252; color: #fff;
    font-size: 12px; font-weight: 700;
    padding: 10px 16px;
    display: flex; align-items: center; gap: 4px;
    flex-shrink: 0; cursor: pointer;
}

.postman-tabs { display: flex; padding: 0 14px; }

.postman-tab {
    font-family: 'Nunito', sans-serif;
    font-size: 11px; font-weight: 600;
    color: #6b7280; padding: 8px 12px;
    cursor: pointer; border-bottom: 2px solid transparent;
}
.postman-tab.active { color: var(--teal); border-bottom-color: var(--teal); }

/* ═══════════════════════════════════════
   JSON BOX
═══════════════════════════════════════ */
.json-box {
    background: #1a1a2e; border-radius: 10px; border: 1px solid #2e2e50;
    padding: 16px 18px;
    font-family: 'Fira Code', monospace; font-size: 11.5px;
    color: #abb2bf; line-height: 1.7;
    margin: 14px 0; overflow-x: auto;
}
@media (max-width: 480px) { .json-box { font-size: 10.5px; padding: 14px 12px; } }

.json-box .j-key  { color: #e06c75; }
.json-box .j-str  { color: #98c379; }
.json-box .j-num  { color: #e5c07b; }
.json-box .j-note {
    display: block; margin-top: 10px;
    font-family: 'Nunito', sans-serif;
    font-size: 11px; font-style: italic; color: #6b7280;
}

.json-box-header {
    display: flex; justify-content: space-between; align-items: center;
    padding: 10px 16px; border-bottom: 1px solid #2e2e50;
    margin: -16px -18px 14px;
}
.json-box-header span { font-family: 'Nunito', sans-serif; font-size: 11px; color: #6b7280; }

/* ═══════════════════════════════════════
   BADGES & HIGHLIGHT URL
═══════════════════════════════════════ */
.badge {
    display: inline-block; padding: 2px 8px; border-radius: 5px;
    font-family: 'Fira Code', monospace;
    font-size: 11.5px; font-weight: 700; margin-right: 4px;
}
.badge-green  { background: #d1fae5; color: #065f46; }
.badge-red    { background: #fee2e2; color: #991b1b; }
.badge-orange { background: #fef3c7; color: #92400e; }

.highlight-url {
    color: var(--teal); font-family: 'Fira Code', monospace;
    font-size: 12px; font-weight: 500; word-break: break-all;
}
</style>

{{-- ═══════════════════════════════════════
     LAYOUT
═══════════════════════════════════════ --}}
<div class="dash-layout">

    @include('layouts.sidebar')
    @include('layouts.topbar')
    
    {{-- Main Content --}}
    <main class="main-content">

        <div class="page-heading">SMARTJMP</div>

        <div class="doc-card">
            <div class="md-content">

                {{-- ── Judul & Intro ── --}}
                <h1>SETUP</h1>
                <p class="doc-intro">
                    Berikut adalah panduan konfigurasi API SMART JMP dalam format Markdown<br>
                    yang bisa kamu gunakan sebagai dokumentasi atau catatan teknis.
                </p>

                {{-- ── Persiapan Awal ── --}}
                <div class="two-col" style="align-items: start;">
                    <div class="doc-img">
                        <img src="{{ asset('media/organisasi kode.png') }}"
                             onerror="this.parentElement.innerHTML='<span style=\'padding:40px;color:#aaa;\'>[ Screenshot Setup ]</span>'"
                             alt="Setup Screenshot">
                    </div>
                    <div>
                        <h2>Persiapan Awal</h2>
                        <p>Akun SMARTJMP: Pastikan sudah memiliki akun di sistem SMARTJMP.</p>
                        <ol>
                            <li>
                                <strong>API Key:</strong>
                                <ul style="margin-top: 6px;">
                                    <li>Masuk ke halaman <strong>Profil &gt; Account Setting.</strong></li>
                                    <li>Generate <strong>API Key Public</strong> dan <strong>API Key Service.</strong></li>
                                    <li>Klik tombol <strong>Active</strong> pada keduanya dan tekan <strong>Save.</strong></li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

                <hr class="md-divider">

                {{-- ── Postman Bar ── --}}
                <h2 style="text-align: center;">Konfigurasi Request Postman</h2>
                <p style="text-align: center; color: var(--muted); font-size: 13px; margin-bottom: 16px;">
                    Untuk melakukan request (contoh: Get Pengguna), lakukan pengaturan berikut pada Postman:
                </p>

                <div class="postman-bar">
                    <div class="postman-top">
                        <div class="postman-method">GET</div>
                        <div class="postman-url">
                            {{-- <span class="url-env">{{ '{{URL_PRODUCTION}}' }}</span>
                            <span class="url-path">/master/core/page/data_pengguna/api/data_pengguna.php?read_data=Iya&amp;Organisasi_Kode={{ '{{Organisasi_Kode}}' }}</span> --}}
                        </div>
                        <div class="postman-send">Send ▾</div>
                    </div>
                    <div class="postman-tabs">
                        <div class="postman-tab active">Docs</div>
                        <div class="postman-tab">Params</div>
                    </div>
                </div>

                <hr class="md-divider">

                {{-- ── URL, Params & Auth ── --}}
                <div class="two-col">

                    {{-- Kolom Kiri --}}
                    <div>
                        <h2>1. URL &amp; Endpoint</h2>
                        <p>Ubah URL local menjadi alamat berikut:</p>
                        <ul>
                            <li>Base URL: <a href="#" class="highlight-url">https://intranet.bogorccv.com</a></li>
                            <li>Endpoint Contoh: <span class="highlight-url">/master/core/page/data_pengguna/api/data_pengguna.php</span></li>
                        </ul>
                        <div class="doc-img" style="margin-top: 16px; min-height: 130px;">
                            <img src="{{ asset('media/image.png') }}"
                                 onerror="this.parentElement.innerHTML='<span style=\'padding:32px;color:#aaa;font-size:12px;\'>[ Screenshot Postman Auth ]</span>'"
                                 alt="Postman Auth">
                        </div>
                    </div>

                    {{-- Kolom Kanan --}}
                    <div>
                        <h2>2. Parameter (Params)</h2>
                        <p>Tambahkan atau ubah parameter berikut di tab <strong>Params</strong>:</p>
                        <ul>
                            <li><strong>Organisasi_Kode</strong>: Diambil dari sidebar di bawah tulisan PT. Juanto Mandiri Pratama.</li>
                            <li><strong>read_data</strong>: <strong>Iya</strong>.</li>
                        </ul>

                        <h3>3. Autentikasi (Authorization)</h3>
                        <p>Lakukan langkah-langkah berikut untuk memasukkan token:</p>
                        <ol>
                            <li>Buka tab <strong>Authorization.</strong></li>
                            <li>Pilih <strong>Auth Type</strong>: Bearer Token.</li>
                            <li>Paste API Key yang sudah di-generate ke kolom <strong>Token</strong>.</li>
                        </ol>
                        <ul style="margin-top: 10px;">
                            <li>Contoh format: <code>smartjmp-4926d46d617eb2efdb4159</code></li>
                        </ul>

                        {{-- JSON Response --}}
                        <div class="json-box" style="margin-top: 16px;">
                            <div class="json-box-header">
                                <span>json · Contoh Response</span>
                                <span>⎘ &nbsp; ⧉</span>
                            </div>
{<br>
&nbsp;&nbsp;<span class="j-key">"status"</span>: <span class="j-str">"Sukses"</span>,<br>
&nbsp;&nbsp;<span class="j-key">"data"</span>: {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"id_Pengguna"</span>: <span class="j-num">"320"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"username"</span>: <span class="j-str">"adityasuci011"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"email"</span>: <span class="j-str">"adityasuci011@gmail.com"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"Nama_Depan"</span>: <span class="j-str">"Aditya"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"Nama_Role"</span>: <span class="j-str">"Administrator"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="j-key">"Status"</span>: <span class="j-str">"Aktif"</span><br>
&nbsp;&nbsp;}<br>
}
                            <span class="j-note">
                                Catatan: Terapkan konfigurasi URL, kode organisasi, dan token
                                yang sama untuk pemanggilan endpoint API lainnya di workspace Anda.
                            </span>
                        </div>
                    </div>

                </div>

                <hr class="md-divider">

                {{-- ── Menjalankan Request & Indikator Respon ── --}}
                <h2>Menjalankan Request</h2>
                <p>Setelah semua konfigurasi selesai (URL, Kode Organisasi, dan Token), tekan tombol <strong>Send</strong>.</p>

                <h2>Indikator Respon</h2>
                <ul>
                    <li><span class="badge badge-green">200 OK</span> <strong>Berhasil:</strong> Body JSON berisi data pengguna.</li>
                    <li><span class="badge badge-red">500</span> Internal Server Error.</li>
                    <li><span class="badge badge-orange">404</span> Not Found.</li>
                </ul>

            </div>
        </div>

    </main>
</div>

@endsection