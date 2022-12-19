<? session_start();
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION);
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../common/css/sub_common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="./css/write_form.css">
    <script src="https://kit.fontawesome.com/39dad5f800.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <title>삼천리 - 고객센터</title>
</head>
<body>
    <? include "../common/sub_header.html" ?>
		<div class="main">
			<img src="../sub6/common/images/main-visual.jpg" alt="">
			<h3>Service center</h3>
		</div>
    <div class="subNav">
        <ul>
            <li class="current"><a href="../greet/list.php" class="current">공지사항</a></li>
            <li><a href="../sub6/sub6_2.html">뉴스</a></li>
            <li><a href="../sub6/sub6_3.html">조회/납부</a></li>
            <li><a href="../sub6/sub6_4.html">FAQ</a></li>
        </ul>
    </div>
    <article id="content">
        <div class="titleArea">
            <div class="lineMap">
                <span>home</span> &gt; <span>고객센터</span> &gt; <strong>공지사항</strong>
            </div>
            <h2 class="off">공지사항</h2>
            <p class="off">고객을 위한 아름다운 세상을 만들어 가겠습니다.</p>
            <p class="off">삼천리의 중요한 소식을 모아두었습니다.</p>
        </div>
        <!-- 본문 콘텐츠 영역 -->
        <div class="contentArea">
			<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">
				<ul>
					<li>
						<dl>
							<dt>닉네임</dt>
							<dd><?=$usernick?></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>제목</dt>
							<dd><input type="text" name="subject" value="<?=$item_subject?>"></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>내용</dt>
							<dd><input type="checkbox" name="html_ok" value="y"><span>html쓰기</span><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></dd>
						</dl>
					</li>
				</ul>
				
				<div class="write_button">
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
					<input type="submit" value="수정">
				</div>
			</form>
		</div>
	</article>
        <? include "../common/sub_footer.html" ?>
</body>
</html>