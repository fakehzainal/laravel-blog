<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function blog(): View
    {
        $posts = Post::query()
            ->published()
            ->with(['category', 'tags', 'author'])
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.blog', [
            'posts' => $posts,
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => Tag::query()->orderBy('name')->get(),
        ]);
    }

    public function categories(): View
    {
        $categories = Category::query()
            ->withCount('posts')
            ->orderBy('name')
            ->get();

        return view('blog.categories', [
            'categories' => $categories,
        ]);
    }

    public function index(): View
    {
        $posts = Post::query()
            ->published()
            ->with(['category', 'tags', 'author'])
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => Tag::query()->orderBy('name')->get(),
        ]);
    }

    public function show(string $slug): View
    {
        $post = Post::query()
            ->published()
            ->with(['category', 'tags', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('blog.show', [
            'post' => $post,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function category(string $slug): View
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $posts = Post::query()
            ->published()
            ->with(['category', 'tags', 'author'])
            ->where('category_id', $category->id)
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => Tag::query()->orderBy('name')->get(),
            'activeCategory' => $category,
        ]);
    }

    public function tag(string $slug): View
    {
        $tag = Tag::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $posts = Post::query()
            ->published()
            ->with(['category', 'tags', 'author'])
            ->whereHas('tags', fn ($query) => $query->where('tags.id', $tag->id))
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => Category::query()->orderBy('name')->get(),
            'tags' => Tag::query()->orderBy('name')->get(),
            'activeTag' => $tag,
        ]);
    }
}
