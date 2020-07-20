<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;600&display=swap" rel="stylesheet">
    <title>#inject('title', 'It\'s Worked')</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            font-size: 100%;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #333333;
            background-color: #f7fafb;
        }

        #main {
            display: flex;
            flex-direction: column;
            position: relative;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        #main .banner {
            flex: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .banner img {
            height: 80px;
            opacity: 0.5;
        }

        .sub-banner {
            flex: 1;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            width: 100%;
        }

        .sub-banner a {
            flex: 0 0 120px;
            width: 120px;
            filter: grayscale(100%);
            margin-right: 40px;
            opacity: 0.3;
            text-align: center;
        }

        .sub-banner a:first-child img{
            width: 60px;
        }

        .sub-banner a > img {
            width: 100%;
            height: auto;
        }

        a {
            color: #bd362f;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        h1 {
            color: #111;
            font-size: 42px;
            font-weight: 600;
            line-height: 1.8;
        }
    </style>
</head>
<body>
<main id="main">
    #inject('content')
</main>
</body>
</html>
