<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon" href="/favicon.png"/>
    <title>%inject("title", "Bow Framework")</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    <style>
        :root {
            --bow-darker: #0d0d0f;
            --bow-dark: #141417;
            --bow-border: #26262b;
            --bow-gray: #8a8f98;
            --bow-light: #f4f5f7;
            --bow-red: #9aa0aa;
            --bow-red-dark: #6b7280;
        }

        body {
            font-family: 'Fitree', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bow-darker);
            color: var(--bow-light);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    %inject('content')
</body>
</html>
