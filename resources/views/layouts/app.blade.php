<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'VIP2CARS - Excelencia Automotriz')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">

    @stack('styles')
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --red:       #D0151C;
            --red-dark:  #A50F14;
            --red-glow:  rgba(208,21,28,.18);
            --red-dim:   rgba(208,21,28,.08);
            --white:     #FFFFFF;
            --black:     #080808;
            --dark:      #0F0F0F;
            --mid:       #161616;
            --surface:   #1E1E1E;
            --border:    #242424;
            --border-hi: rgba(208,21,28,.3);
            --text:      #E8E8E8;
            --muted:     #777777;
            --font-d:    'Rajdhani', sans-serif;
            --font-b:    'Barlow', sans-serif;
        }
        html { scroll-behavior: smooth; }
        body { font-family: var(--font-b); background: var(--black); color: var(--text); overflow-x: hidden; line-height: 1.6; }
        a { text-decoration: none; color: inherit; }
    </style>
</head>
<body>
    @include('components.header')
    <main>@yield('content')</main>
    @include('components.footer')
    @stack('scripts')
</body>
</html>