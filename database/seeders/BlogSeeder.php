<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@blog.local'],
            [
                'name' => 'Blog Admin',
                'password' => bcrypt('password'),
            ]
        );

        $categoryData = [
            ['name' => 'Teknologi', 'description' => 'Artikel seputar development, tools, dan tren teknologi.'],
            ['name' => 'Tutorial', 'description' => 'Panduan langkah demi langkah yang praktis.'],
            ['name' => 'Produktivitas', 'description' => 'Tips workflow dan manajemen waktu untuk developer.'],
            ['name' => 'Karier', 'description' => 'Pembahasan karier dan pengembangan skill profesional.'],
        ];

        $categories = collect($categoryData)->map(function (array $data) {
            return Category::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                $data
            );
        });

        $tagNames = ['Laravel', 'Filament', 'MySQL', 'Tips', 'Backend', 'UI'];
        $tags = collect($tagNames)->map(function (string $name) {
            return Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
        });

        $postData = [
            ['title' => 'Memulai Blog dengan Laravel 12 dan Filament', 'minutes_ago' => 30],
            ['title' => 'Struktur Konten yang Efektif untuk Blog Teknologi', 'minutes_ago' => 90],
            ['title' => 'Optimasi Query Eloquent untuk Halaman Daftar Post', 'minutes_ago' => 180],
            ['title' => 'Mendesain Landing Page Blog yang Responsif', 'minutes_ago' => 260],
            ['title' => 'Checklist Publikasi Artikel yang Konsisten', 'minutes_ago' => 340],
            ['title' => 'Mengenal Pola CRUD yang Rapi di Filament', 'minutes_ago' => 420],
        ];

        foreach ($postData as $index => $data) {
            $post = Post::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'category_id' => $categories[$index % $categories->count()]->id,
                    'user_id' => $user->id,
                    'content' => $this->contentTemplate($data['title']),
                    'excerpt' => 'Ringkasan singkat untuk artikel: '.$data['title'],
                    'featured_image' => 'https://picsum.photos/seed/blog-'.$index.'/900/600',
                    'is_published' => true,
                    'published_at' => now()->subMinutes($data['minutes_ago']),
                ]
            );

            $post->tags()->sync(
                $tags->shuffle()->take(3)->pluck('id')->all()
            );
        }
    }

    private function contentTemplate(string $title): string
    {
        return <<<HTML
<p><strong>{$title}</strong> membahas pendekatan praktis agar pengembangan blog tetap cepat dan terstruktur.</p>
<p>Fokus utamanya adalah menjaga kualitas data, konsistensi tampilan, dan kemudahan pemeliharaan kode dalam jangka panjang.</p>
<p>Gunakan artikel ini sebagai referensi awal sebelum menyesuaikannya dengan kebutuhan proyek Anda.</p>
HTML;
    }
}
