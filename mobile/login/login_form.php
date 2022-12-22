<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삼천리 - 로그인</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./css/login_form.css">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

</head>
<body>
    
<div id=wrap>
    <header>
        <h1>
            <a href="../index.html">삼천리 로고</a>
        </h1>
    </header>
    <article>
        <h2>아이디와 비밀번호를 입력해주세요.</h2>
        <form  name="member_form" method="post" action="login.php">
            <div id="id_pw_input">
                <ul>
                    <li>
                        <input type="text" name="id" class="login_input" placeholder="삼천리 ID" required>
                    </li>
                    <li>
                        <input type="password" name="pass" class="login_input"  placeholder="비밀번호" required>
                    </li>
                </ul>						
            </div>
            <div id="login_button">
                <button type="submit">로그인</button>
            </div>
            <ul>
                <li>
                    <a href="./id_find.php">아이디 찾기</a>
                </li>
                <li>
                    <a href="./pw_find.php">비밀번호 찾기</a>
                </li>
                <li>
                    <a href="../member/member_check.html">회원가입</a>
                </li>
            </ul>
        </form>
    </article>
</div>
</body>
</html>