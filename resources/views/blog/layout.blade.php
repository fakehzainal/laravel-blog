<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Laravel Blog')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --ink: #0b0b0f;
                --muted: #5b5f6a;
                --accent: #ff6b00;
                --accent-2: #0ea5e9;
                --surface: #ffffff;
                --surface-alt: #f5f2ec;
                --line: rgba(11, 11, 15, 0.08);
                --shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: "Space Grotesk", system-ui, -apple-system, sans-serif;
                color: var(--ink);
                background: radial-gradient(1200px 600px at 10% -10%, #ffe7d1 0%, transparent 60%),
                    radial-gradient(900px 500px at 90% 0%, #dbeafe 0%, transparent 55%),
                    #f8f5ef;
                min-height: 100vh;
            }

            body.theme-dark {
                color: #e5e7eb;
                background: radial-gradient(1000px 600px at 15% -20%, #1b1f2a 0%, transparent 60%),
                    radial-gradient(800px 500px at 90% 0%, #0f172a 0%, transparent 55%),
                    #0b0f19;
            }

            body.theme-dark .brand span {
                color: #f97316;
            }

            body.theme-dark .nav a {
                color: #cbd5f5;
            }

            body.theme-dark .hero {
                background: linear-gradient(135deg, #0f172a 0%, #111827 60%, #1f2937 100%);
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.45);
            }

            body.theme-dark .hero::after {
                background: rgba(14, 165, 233, 0.18);
            }

            body.theme-dark .pill,
            body.theme-dark .badge,
            body.theme-dark .card,
            body.theme-dark .content {
                background: rgba(17, 24, 39, 0.92);
                border: 1px solid rgba(148, 163, 184, 0.18);
                color: #e5e7eb;
            }

            body.theme-dark .card {
                box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
            }

            body.theme-dark .meta,
            body.theme-dark .footer,
            body.theme-dark .hero p {
                color: #cbd5f5;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .shell {
                max-width: 1180px;
                margin: 0 auto;
                padding: 32px 28px 64px;
            }

            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                padding: 10px 14px;
                background: rgba(255, 255, 255, 0.72);
                border: 1px solid var(--line);
                border-radius: 16px;
                backdrop-filter: blur(6px);
            }

            .brand {
                font-weight: 700;
                letter-spacing: -0.02em;
            }

            .brand span {
                color: var(--accent);
            }

            .nav a {
                margin-left: 16px;
                font-weight: 500;
                color: var(--muted);
            }

            .nav {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
            }

            .nav a {
                margin-left: 0;
                padding: 8px 12px;
                border-radius: 10px;
                border: 1px solid transparent;
                transition: 0.2s ease;
            }

            .nav a:hover {
                border-color: var(--line);
                background: rgba(255, 255, 255, 0.8);
                color: var(--ink);
            }

            .theme-toggle {
                margin-left: 4px;
                border: 1px solid var(--line);
                background: var(--surface);
                color: var(--ink);
                padding: 6px 12px;
                border-radius: 999px;
                font-size: 0.85rem;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 40px;
            }

            .theme-toggle svg {
                width: 18px;
                height: 18px;
                display: block;
            }

            body.theme-dark .theme-toggle {
                background: rgba(17, 24, 39, 0.92);
                color: #e5e7eb;
                border: 1px solid rgba(148, 163, 184, 0.18);
            }

            body.theme-dark .topbar {
                background: rgba(15, 23, 42, 0.75);
                border-color: rgba(148, 163, 184, 0.2);
            }

            body.theme-dark .nav a:hover {
                background: rgba(30, 41, 59, 0.8);
                border-color: rgba(148, 163, 184, 0.2);
                color: #e5e7eb;
            }

            .hero {
                margin-top: 32px;
                padding: 48px;
                background: linear-gradient(135deg, #ffffff 0%, #fff7ed 60%, #e0f2fe 100%);
                border-radius: 32px;
                box-shadow: var(--shadow);
                position: relative;
                overflow: hidden;
            }

            .hero::after {
                content: "";
                position: absolute;
                right: -60px;
                top: -60px;
                width: 180px;
                height: 180px;
                border-radius: 36px;
                background: rgba(14, 165, 233, 0.2);
                transform: rotate(18deg);
            }

            .hero h1 {
                font-family: "Instrument Serif", serif;
                font-size: clamp(2.4rem, 4vw, 3.6rem);
                margin: 0 0 12px;
                letter-spacing: -0.02em;
            }

            .hero p {
                color: var(--muted);
                max-width: 520px;
                font-size: 1.05rem;
                margin: 0;
            }

            .pill {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 12px;
                border-radius: 999px;
                background: #fff;
                border: 1px solid var(--line);
                font-size: 0.85rem;
                color: var(--muted);
            }

            .section {
                margin-top: 32px;
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 24px;
            }

            .card {
                background: var(--surface);
                border-radius: 24px;
                padding: 22px;
                border: 1px solid var(--line);
                box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card:hover {
                transform: translateY(-4px);
                box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
            }

            .card h3 {
                margin: 8px 0 12px;
                font-size: 1.2rem;
            }

            .meta {
                font-size: 0.85rem;
                color: var(--muted);
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                align-items: center;
            }

            .badge {
                padding: 4px 10px;
                border-radius: 999px;
                background: var(--surface-alt);
                font-size: 0.78rem;
                color: var(--ink);
            }

            .tags {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
                margin-top: 12px;
            }

            .footer {
                margin-top: 48px;
                color: var(--muted);
                font-size: 0.9rem;
            }

            .content {
                background: var(--surface);
                border-radius: 24px;
                padding: 32px;
                box-shadow: var(--shadow);
                border: 1px solid var(--line);
            }

            .content h1 {
                font-family: "Instrument Serif", serif;
                margin-top: 0;
            }

            .content img {
                max-width: 100%;
                border-radius: 18px;
            }

            .filters {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 16px;
            }

            .post-card__inner {
                display: flex;
                gap: 16px;
                align-items: flex-start;
            }

            .post-card__image {
                width: 140px;
                height: 140px;
                object-fit: cover;
                border-radius: 16px;
                flex-shrink: 0;
            }

            .post-card__content {
                min-width: 0;
            }

            .post-card__content h3,
            .post-card__content p {
                overflow-wrap: anywhere;
            }

            @media (max-width: 1024px) {
                .shell {
                    padding: 24px 18px 48px;
                }

                .hero {
                    padding: 32px;
                    border-radius: 24px;
                }

                .grid {
                    grid-template-columns: 1fr;
                    gap: 16px;
                }

                .card {
                    padding: 18px;
                    border-radius: 20px;
                }

                .topbar {
                    flex-direction: row;
                    align-items: center;
                    justify-content: space-between;
                    gap: 10px;
                    padding: 10px 12px;
                }

                .nav {
                    width: auto;
                    justify-content: flex-end;
                    flex-wrap: nowrap;
                    gap: 6px;
                }

                .nav a {
                    flex: 0 0 auto;
                    text-align: left;
                    padding: 6px 8px;
                    font-size: 0.92rem;
                }

                .theme-toggle {
                    margin-left: 0;
                }

                .post-card__image {
                    width: 120px;
                    height: 120px;
                }

                .post-card__inner {
                    gap: 14px;
                }
            }

            @media (min-width: 1025px) {
                .grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            @media (max-width: 720px) {
                .shell {
                    padding: 24px 14px 48px;
                }

                .hero {
                    margin-top: 28px;
                    padding: 24px;
                    border-radius: 20px;
                }

                .topbar {
                    flex-direction: row;
                    align-items: center;
                    justify-content: space-between;
                    gap: 12px;
                    padding: 10px 12px;
                }

                .nav {
                    width: auto;
                    gap: 6px;
                    justify-content: flex-end;
                }

                .nav a {
                    padding: 6px 8px;
                    font-size: 0.92rem;
                    flex: 0 0 auto;
                    text-align: left;
                }

                .section {
                    margin-top: 24px;
                }

                .grid {
                    grid-template-columns: 1fr;
                    gap: 14px;
                }

                .card {
                    border-radius: 18px;
                    padding: 16px;
                }

                .post-card__inner {
                    flex-direction: column;
                    gap: 12px;
                }

                .post-card__image {
                    width: 100%;
                    height: 190px;
                    border-radius: 12px;
                }

                .theme-toggle {
                    margin-left: 0;
                }

            }
        </style>
    </head>
    <body>
        <div class="shell">
            <div class="topbar">
                <div class="brand">Laravel<span>Blog</span></div>
                <div class="nav">
                    <a href="{{ route('blog.index') }}">Home</a>
                    <a href="{{ route('blog.list') }}">Blog</a>
                    <a href="{{ route('blog.categories') }}">Category</a>
                    <button class="theme-toggle" type="button" data-theme-toggle aria-label="Toggle theme" title="Toggle theme"></button>
                </div>
            </div>

            @yield('content')

            <div class="footer">Built with Laravel 12 + Filament</div>
        </div>
        <script>
            (function () {
                const body = document.body;
                const button = document.querySelector('[data-theme-toggle]');
                const stored = localStorage.getItem('blog_theme');

                const icons = {
                    sun: '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 7a5 5 0 1 1 0 10a5 5 0 0 1 0-10m0-5a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1m0 18a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1m10-8a1 1 0 0 1-1 1h-2a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1M6 12a1 1 0 0 1-1 1H3a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1m12.364-7.364a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 0 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0M7.464 16.95a1 1 0 0 1 0 1.414L6.05 19.778a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0m12.314 2.828a1 1 0 0 1-1.414 0l-1.414-1.414a1 1 0 0 1 1.414-1.414l1.414 1.414a1 1 0 0 1 0 1.414M7.464 7.05a1 1 0 0 1-1.414 0L4.636 5.636A1 1 0 1 1 6.05 4.222L7.464 5.636a1 1 0 0 1 0 1.414"/></svg>',
                    moon: '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12.1 3a9 9 0 1 0 8.9 11.2a1 1 0 0 0-1.2-1.2A7 7 0 0 1 11 4.2a1 1 0 0 0-1.2-1.2A9.2 9.2 0 0 0 12.1 3"/></svg>',
                };

                if (stored === 'dark') {
                    body.classList.add('theme-dark');
                }

                if (button) {
                    button.innerHTML = body.classList.contains('theme-dark') ? icons.sun : icons.moon;
                    button.addEventListener('click', function () {
                        body.classList.toggle('theme-dark');
                        const isDark = body.classList.contains('theme-dark');
                        localStorage.setItem('blog_theme', isDark ? 'dark' : 'light');
                        button.innerHTML = isDark ? icons.sun : icons.moon;
                    });
                }
            })();
        </script>
    </body>
</html>
