<? 
	session_start(); 
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	// 첨부된 이미지 가져오기
	for ($i=0; $i<3; $i++)    // 0~2
	{
		if ($image_copied[$i])  //첨부된 이미지가 있으면
		{
			$imageinfo = GetImageSize("../../concert/data/".$image_copied[$i]);
			//배열로 리턴 [이미지 너비,이미지 높이,이미지 타입]

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)  //이미지 너비를 제한
				$image_width[$i] = 785;
		}
		else  //첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
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
		<link rel="stylesheet" href="../css/sub4_content1.css">
		<link rel="stylesheet" href="../common/css/sub4_common.css">
		<link rel="stylesheet" href="./css/view.css">
		<link rel="stylesheet" href="./css/write_form.css">
    <script src="https://kit.fontawesome.com/39dad5f800.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <title>삼천리 - 고객센터</title>
</head>
</head>
<body>
<div id="wrap">
    <header id="headerArea">
		<h1><a href="../index.html">삼천리 로고</a></h1>
    <div class="nav_Tab">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav id="gnb">
        <h2 class="hidden">글로벌네비게이션영역</h2>
        <ul class="nav_link">
            <li>
                <h3 class="close">회사소개</h3>
                <ul>
                    <li>
                        <h4><a href="../sub1_1.html">그룹소개</a></h4>
                        <h4><a href="../sub1_2.html">인사말</a></h4>
                        <h4><a href="../sub1_3.html">연혁</a></h4>
                        <h4><a href="../sub1_4.html">CI</a></h4>
                    </li>
                </ul>
            </li>
            <li>
                <h3 class="close">사업소개</h3>
                <ul>
                    <li>
                        <h4><a href="../sub2_1.html">도시가스</a></h4>
                        <h4><a href="../sub2_2.html">발전사업</a></h4>
                        <h4><a href="../sub2_3.html">집단에너지</a></h4>
                        <h4><a href="../sub2_4.html">R & D</a></h4>
                    </li>
                </ul>
            </li>
            <li>
                <h3 class="close">인재채용</h3>
                <ul>
                    <li>
                        <h4><a href="../sub3_1.html">인재상</a></h4>
                        <h4><a href="../sub3_2.html">직무소개</a></h4>
                        <h4><a href="../sub3_3.html">복리후생</a></h4>
                    </li>
                </ul>
            </li>
            <li>
                <h3 class="close">고객센터</h3>
                <ul>
                    <li>
                        <h4><a href="./list.php">뉴스</a></h4>
                        <h4><a href="../sub4_2.html">FAQ</a></h4>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sns">
            <li>
                <a href="https://www.facebook.com/samchulybike.official/">
                    <span class="hidden">페이스북</span>
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/samchulybike_official/">
                    <span class="hidden">인스타그램</span>
                    <i class="fa-brands fa-instagram"></i>    
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/channel/UCqkxLnXOjzVB8mkW2dJtS2Q">
                    <span class="hidden">유튜브</span>
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/samchully4cs">
                    <span class="hidden">트위터</span>
                    <i class="fa-brands fa-twitter"></i>    
                </a>
            </li>
        </ul>
        <?
        @extract($_POST);
        @extract($_GET);
        @extract($_SESSION); 
        if(!$userid)
        {
        ?>
        <ul class="login">
            <li>
                <a href="../login/login_form.php">Log in</a>
            </li>
            <li>
                <a href="../member/member_check.html">Join</a>
            </li>
        </ul>
        <?
            }
            else
            {
        ?>
        <ul class="login">
            <li>
                <a href="../login/logout.php">Log out</a>
            </li>
            <li>
                <a href="../member/member_form_modify.php">info</a>
            </li>
        </ul>
        <?
            }
        ?>
    </nav>
    </header>
    <div class="main">
        <h3>고객센터</h3>
    </div>
    <div class="subNav">
        <ul>
            <li class="current"><a href="./list.php" class="current">뉴스</a></li>
            <li><a href="../sub4_2.html">FAQ</a></li>
        </ul>
    </div>
    <article id="content">
			<h2>NEWS</h2>
			<div class=contentArea>
					<ul class="head">
						<li>
							<?= $item_nick ?>	
						</li>
						<li>
							<?= $item_subject ?>
						</li>
					</ul>
				</class=>
				<p>
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "../../concert/data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</p>
		<ul class="ripple_output">
		<?
	    $sql = "select * from free_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<li>
				<dl>
					<dt><?=$ripple_id?><span><?=$ripple_date?></span>
<? 
					if($userid=="admin" || $userid==$ripple_id)
			          echo "<span><a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num&page=$page&style=$style'>[삭제]</a></span>"; 
?>				
					</dt>
					<dd><?=$ripple_content?></dd>
				</dl>
			</li>
<?
			}
?>	
		</ul>
		<form class="ripple_input"  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&style=<?=$style?>">  
				<span><?=$userid?></span>
				<textarea rows="5" cols="65" name="ripple_content" placeholder="타인의 권리를 침해하거나 모욕하는 댓글 작성시 불이익을 당할 수 있습니다."></textarea>
				<button type="button" onclick="check_input()">등록</button>
		</form>
		<ul class="view_button">
			<li><a href="list.php?table=<?=$table?>&page=<?=$page?>&style=<?=$style?>">목록</a></li>
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
	{
?>
				<li><a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>&style=<?=$style?>">수정</a></li>
				<li><a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>&style=<?=$style?>')">삭제</a></li>
<?
	}
?>
<? 
	if($userid)
	{
?>
				<li><a href="write_form.php?table=<?=$table?>&style=<?=$style?>">글쓰기</a></li>
<?
	}
?>
			</ul>
		</article>
		<footer id="footerArea">
			<a class="topMove" href="#"></a>
			<img src="../common/image/footerlogox2.png" alt="삼천리 로고">
			<ul>
					<li>
							<a href="#">
									개인정보 처리방침
							</a>
					</li>
					<li>
							<a href="#">
									이용약관
							</a>
					</li>
					<li>
							<a href="#">
									메일주소 무단수집 거부
							</a>
					</li>
			</ul>
			<p>07328 - 서울특별시 영등포구 국제금융로 6길 24 (주) 삼천리</p>
			<ul>
					<li>
							<a href="#">
									Tel : 031-268-7742
							</a>
					</li>
					<li>
							<a href="#">
									이메일 : anfakt@naver.com
							</a>
					</li>
			</ul>
			<div class="family">
					<a href="#">Family site</a>
					<ul>
							<li>
									<a href="http://www.samtan.co.kr/res/main/main.php" title="" target="_blank">(주)ST international</a>
							</li>
							<li>
									<a href="http://www.samchullyeng.co.kr/" title="" target="_blank">(주)삼천리 ENG</a>
							</li>
							<li>
									<a href="http://www.samchullyes.co.kr/index.jsp" title="" target="_blank">(주)삼천리 ES</a>
							</li>
							<li>
									<a href="https://huces.co.kr/" title="" target="_blank">(주)HUCES</a>
							</li>
							<li>
									<a href="http://www.chai797.co.kr/chai/main/main.html" title="" target="_blank">(주)SL&C(Chai797)</a>
							</li>
							<li>
									<a href="https://www.samchullymotors.co.kr/" title="" target="_blank">(주)삼천리 모터스</a>
							</li>
							<li>
									<a href="https://chunman.or.kr/" title="" target="_blank">(주)천만장학회</a>
							</li>
					</ul>
			</div>
		</footer>
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="../js/sub4_content1.js"></script>
	<script>
		function del(href) 
		{
			if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
					document.location.href = href;
			}
		}
		
		function check_input()
		{
			if (!document.ripple_form.ripple_content.value)
			{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return;
			}
			document.ripple_form.submit();
    }

	</script>
</body>
</html>