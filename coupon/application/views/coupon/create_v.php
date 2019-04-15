<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>CodeIgniter</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="/bbs/include/css/bootstrap.css" />
        <script>
            $(document).ready(function() {
                $("#write_btn").click(function() {
                    if ($("#input").val() == '') {
                        alert('3자리를 입력해 주세요.');
                        $("#input").focus();
                        return false;
                    } else {
                        $("#write_action").submit();
                    }
                });
            });
       </script>
    </head>
    <body>
        <div id="main">
            <header id="header" data-role="header" data-position="fixed">
                <blockquote>
                    <p>
                        Frame work : CodeIgniter
                    </p>
                    <small>실행 예제</small>
                </blockquote>
            </header>
            <nav id="gnb">
                <ul>
                    <li>
                        <a rel="external" href="/test/<?php echo $this -> uri -> segment(1); ?>/lists/<?php echo $this -> uri -> segment(3); ?>"> 쿠폰 프로젝트 </a>
                    </li>
                </ul>
            </nav>
            <article id="board_area">
                <header>
                    <h1></h1>
                </header>
                <form class="form-horizontal" method="post" action="" id="write_action">
                    <fieldset>
                        <legend>
                            쿠폰 생성
                        </legend>
                        <div class="control-group">
                            <label class="control-label" for="input01">쿠폰 번호 (3자리)</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="input" name="coupon_num">
                                <p class="help-block">
                                    3자리를 입력해주세요.
                                </p>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" id="write_btn">
                                    발급
                                </button>
                                <button class="btn" onclick="document.location.reload()">
                                    취소
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </article>
            <footer id="footer">
                <dl>
                    <dd>
                        Copyright by <em class="black">KyungRyeol</em>.
                    </dd>
                </dl>
            </footer>
        </div>
    </body>
</html>
