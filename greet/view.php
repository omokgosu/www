<? session_start();
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION);
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    <link rel="stylesheet" href="./css/view.css">
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
			<div class="head">
				<h3><?= $item_subject ?></h3>
				<ul>
					<li>
						<?= $item_nick ?>
					</li>
					<li>
						<?= $item_date ?>
					</li>
					<li>
						조회 <?= $item_hit ?>
					</li>
				</ul>
			</div>
			<p><?= $item_content ?></p>
			<ul class="view_button">
				<li>
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
				</li>
			
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<li><a href="modify_form.php?mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a></li>
				<li><a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a></li>
<?
	}
?>
<? 
	if($userid )
	{
?>
				<li><a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a></li>
<?
	}
?>	
			</ul>
	</article>
	<? include "../common/sub_footer.html" ?>
	<script>
		function del(href) 
		{
			if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
					document.location.href = href;
			}
			}
	</script>
</body>
</html>