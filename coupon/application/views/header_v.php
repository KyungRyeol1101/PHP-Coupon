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
                    <p>
<?php
    if ( @$this -> session -> userdata('logged_in') == TRUE) {
?>
<?php echo $this -> session -> userdata('username');?> 님 환영합니다. <a href="/coupon/index.php/auth/logout" class="btn">로그아웃</a>
<?php
    } else {
?>
<a href="/coupon/index.php/auth/login" class="btn btn-primary"> 로그인 </a>
<?php
    }
?>
                    </p>

                </blockquote>
            </header>
