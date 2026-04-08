<h2>Data Dokumentasi {{ ucfirst($status) }}</h2>

@foreach($halaman as $item)

<div class="doc-item">
    <h3>{{ $item->deskripsi }}</h3>
    <p>{{ \Illuminate\Support\Str::limit($item->jawaban,100) }}</p>
</div>

@endforeach