<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>쿠폰 Web</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link type="text/css" rel='stylesheet' href="/todo/include/css/bootstrap.css" />
    </head>
    <body>
        <div id="main">
            <header id="header" data-role="header" data-position="fixed">
                <blockquote>
                    <p>
                        Frame work : CodeIgniter / Writer : KyungRyeol
                    </p>
                    <small>실행 예제</small>
                </blockquote>
            </header>
            <nav id="gnb">
                <ul>
                    <li>
                        <a rel="external" href="/bbs/<?php echo $this -> uri -> segment(1); ?>/lists/<?php echo $this -> uri -> segment(3); ?>"> 쿠폰 프로젝트 </a>
                    </li>
                </ul>
            </nav>
