<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>#inject('title', 'It\'s Worked')</title>
    <style type="text/css">
        div#main {
          position: relative;
          margin: 10% auto;
          font-size: 15px;
          width: 550px;
          text-align: center;
          font-family: "Montserrat", "console", monospace, serif, "sans-serif";
        }
        a {
          color: #bd362f;
          text-decoration: none;
        }
        h1 {
          color: #bd362f;
          text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="main">
      #inject('content')
    </div>
</body>
</html>
