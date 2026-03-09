<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon" href="/favicon.png"/>
    <title>%inject("title", "Bow Framework")</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bow-red: #e63946;
            --bow-red-dark: #c1121f;
            --bow-dark: #1d1d1d;
            --bow-darker: #141414;
            --bow-light: #f8f9fa;
            --bow-gray: #6c757d;
            --bow-border: #2d2d2d;
        }

        html {
            line-height: 1.6;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bow-darker);
            color: var(--bow-light);
            min-height: 100vh;
        }

        a {
            color: var(--bow-red);
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: var(--bow-red-dark);
        }
    </style>
</head>
<body>
    %inject('content')
</body>
</html>
