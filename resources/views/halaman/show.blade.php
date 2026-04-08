@extends('layouts.app')

@section('title', 'SMART JMP')

@section('content')

<link rel="stylesheet" href="{{ asset('halaman/detail-halaman.css') }}">

<div class="dash-layout">

    @include('layouts.sidebar')
    @include('layouts.topbar')

    <div class="page-wrapper">
        <div class="content-card">

            {{-- ── Breadcrumb ── --}}
            <nav class="breadcrumb" aria-label="breadcrumb">
                <span class="breadcrumb-item">{{ $halaman->kategori->bagian->judul ?? '-' }}</span>
                <span class="breadcrumb-sep">›</span>
                <span class="breadcrumb-item">{{ $halaman->kategori->judul ?? '-' }}</span>
                <span class="breadcrumb-sep">›</span>
                <span class="breadcrumb-item active">{{ $halaman->deskripsi }}</span>
            </nav>

            {{-- ── Judul ── --}}
            <h1 class="page-title">{{ $halaman->deskripsi }}</h1>

            {{-- ── Meta Badges ── --}}
            <div class="meta-row">
                <span class="meta-badge">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M3 7v14h18V7H3zm0-3h18v2H3V4z"/>
                    </svg>
                    {{ $halaman->kategori->bagian->judul ?? '-' }}
                </span>
                <span class="meta-sep">·</span>
                <span class="meta-badge">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                    </svg>
                    {{ $halaman->kategori->judul ?? '-' }}
                </span>
            </div>

            <hr class="content-divider">

            {{-- ── Isi Jawaban ── --}}
            <div class="halaman-content">
                {!! $halaman->jawaban !!}
            </div>

        </div>
    </div>

</div>

@endsection