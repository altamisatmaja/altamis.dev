<?php

use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $trackedFiles = [
        resource_path('views/welcome.blade.php'),
        resource_path('js/App.svelte'),
        resource_path('js/components/Hero.svelte'),
        resource_path('js/components/About.svelte'),
        resource_path('js/components/Projects.svelte'),
        resource_path('js/components/TechStack.svelte'),
        resource_path('js/components/Achievements.svelte'),
        resource_path('js/components/Footer.svelte'),
    ];

    $timestamps = array_filter(array_map(static function ($path) {
        return is_file($path) ? filemtime($path) : null;
    }, $trackedFiles));

    $lastModified = !empty($timestamps)
        ? date(DATE_W3C, max($timestamps))
        : now()->toW3cString();

    return response()
        ->view('sitemap', [
            'homeUrl' => url('/'),
            'lastModified' => $lastModified,
        ])
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/llms.txt', function () {
    return response()
        ->view('llms', [
            'homeUrl' => url('/'),
            'sitemapUrl' => url('/sitemap.xml'),
            'contactUrl' => 'mailto:hello@altamis.dev',
            'collabUrl' => 'mailto:collab@altamis.dev',
        ])
        ->header('Content-Type', 'text/plain; charset=UTF-8');
})->name('llms');

Route::get('/', function () {
    return view('welcome');
})->name('home');
