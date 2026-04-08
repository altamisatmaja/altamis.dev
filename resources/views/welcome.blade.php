<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $siteName = 'Altamis';
        $pageTitle = 'Altamis | Software Engineer & Full-Stack Developer for Indonesia';
        $pageDescription = 'Altamis is a software engineer and full-stack developer building fast websites, mobile apps, and backend systems for startups and businesses across Indonesia, including East Java.';
        $siteUrl = url('/');
        $canonicalUrl = url()->current();
        $pageImage = asset('storage/assets/images/altamis-hero-Image.png');
        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebSite',
                    '@id' => $siteUrl . '#website',
                    'url' => $siteUrl,
                    'name' => $siteName,
                    'description' => $pageDescription,
                    'inLanguage' => app()->getLocale(),
                ],
                [
                    '@type' => 'Person',
                    '@id' => $siteUrl . '#person',
                    'name' => $siteName,
                    'url' => $siteUrl,
                    'image' => $pageImage,
                    'jobTitle' => 'Software Engineer and Full-Stack Developer',
                    'description' => 'Software engineer focused on fast websites, mobile apps, backend systems, and product engineering.',
                    'knowsAbout' => [
                        'Software engineering',
                        'Full-stack development',
                        'Web development',
                        'Mobile app development',
                        'Laravel',
                        'Go',
                        'Flutter',
                        'React',
                        'Svelte',
                        'Technical SEO',
                    ],
                    'homeLocation' => [
                        '@type' => 'Place',
                        'name' => 'Indonesia',
                    ],
                    'areaServed' => [
                        [
                            '@type' => 'Country',
                            'name' => 'Indonesia',
                        ],
                        [
                            '@type' => 'AdministrativeArea',
                            'name' => 'East Java',
                        ],
                    ],
                    'mainEntityOfPage' => [
                        '@id' => $siteUrl . '#website',
                    ],
                ],
            ],
        ];
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="author" content="{{ $siteName }}">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="theme-color" content="#007aff">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="preload" as="image" href="{{ $pageImage }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $pageImage }}">
    <meta property="og:image:alt" content="Altamis software engineer and full-stack developer">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $pageImage }}">
    <link rel="icon" type="image/svg+xml" href="/storage/assets/icons/altamis-icon.svg">
    <script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 20s linear infinite;
            width: max-content;
        }
    </style>
</head>
<body class="bg-white">
    <div id="app"></div>
</body>
</html>
