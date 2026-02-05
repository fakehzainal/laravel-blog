@extends('blog.layout')

@section('title', $post->title)

@section('content')
    <section class="hero">
        <div class="pill">{{ $post->category?->name ?? 'Uncategorized' }}</div>
        <h1>{{ $post->title }}</h1>
        <p>
            {{ $post->published_at?->format('d M Y') }}
            · {{ $post->author?->name ?? 'Admin' }}
        </p>
    </section>

    <section class="section content">
        @if ($post->featured_image)
            <p>
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
            </p>
        @endif
        {!! $post->content !!}

        <div class="tags" style="margin-top: 24px;">
            @foreach ($post->tags as $tag)
                <a class="badge" href="{{ route('blog.tag', $tag->slug) }}">#{{ $tag->name }}</a>
            @endforeach
        </div>
    </section>

    <section class="section">
        <a class="badge" href="{{ route('blog.index') }}">Kembali ke daftar</a>
    </section>
@endsection
