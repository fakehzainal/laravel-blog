@extends('blog.layout')

@section('title', 'Blog')

@section('content')
    <section class="hero">
        <div class="pill">Insight � Tutorials � Updates</div>
        <h1>Ruang baca untuk ide yang bergerak cepat.</h1>
        <p>Kumpulan tulisan terbaru seputar produk, engineering, dan kisah di balik layar.</p>
        <div class="filters">
            @if (!empty($activeCategory))
                <span class="badge">Kategori: {{ $activeCategory->name }}</span>
            @endif
            @if (!empty($activeTag))
                <span class="badge">Tag: {{ $activeTag->name }}</span>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="grid">
            @forelse ($posts as $post)
                <a class="card post-card" href="{{ route('blog.show', $post->slug) }}">
                    <div class="post-card__inner">
                        @if ($post->featured_image)
                            <img class="post-card__image" src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                        @endif
                        <div class="post-card__content">
                            <div class="meta">
                                <span>{{ $post->published_at?->format('d M Y') }}</span>
                                <span>�</span>
                                <span>{{ $post->author?->name ?? 'Admin' }}</span>
                            </div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->excerpt }}</p>
                            <div class="tags">
                                <span class="badge">{{ $post->category?->name }}</span>
                                @foreach ($post->tags as $tag)
                                    <span class="badge">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="card">
                    <h3>Belum ada posting.</h3>
                    <p>Tambahkan posting pertama dari panel admin.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section">
        {{ $posts->links() }}
    </section>
@endsection
