@extends('blog.layout')

@section('title', 'Categories')

@section('content')
    <section class="hero">
        <div class="pill">Kategori Blog</div>
        <h1>Pilih kategori yang ingin kamu baca.</h1>
        <p>Semua topik dikelompokkan agar lebih mudah dijelajahi.</p>
    </section>

    <section class="section">
        <div class="grid">
            @forelse ($categories as $category)
                <a class="card" href="{{ route('blog.category', $category->slug) }}">
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description ?: 'Belum ada deskripsi kategori.' }}</p>
                    <div class="tags">
                        <span class="badge">{{ $category->posts_count }} post</span>
                    </div>
                </a>
            @empty
                <div class="card">
                    <h3>Belum ada kategori.</h3>
                </div>
            @endforelse
        </div>
    </section>
@endsection
