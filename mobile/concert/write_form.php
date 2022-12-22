<? 
	session_start();
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	include "../lib/dbconn.php";
	//새글쓰기
	//$table='concert'

	//수정글쓰기
	//$table
	//$num
	//mode=modify
	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
		<link rel="stylesheet" href="./css/write_form.css">
    <script src="https://kit.fontawesome.com/39dad5f800.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <title>삼천리 - 고객센터</title>
		<script>
			function check_input()
			{
					if (!document.board_form.subject.value)
					{
							alert("제목을 입력하세요!");    
							document.board_form.subject.focus();
							return;
					}

					if (!document.board_form.content.value)
					{
							alert("내용을 입력하세요!");    
							document.board_form.content.focus();
							return;
					}
					document.board_form.submit();
			}
		</script>
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
					<!-- 본문 콘텐츠 영역 -->
			<article id="content">
				<h2>NEWS</h2>
					<div class="contentArea">
<?
		if($mode=="modify")
		{
?>
		<form  name="board_form" method="post" action="./insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>&style=<?=$style?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="./insert.php?table=<?=$table?>&style=<?=$style?>&style=<?=$style?>" enctype="multipart/form-data"> 
<?
	}
?>
				<ul class="head">
					<li>
						<?=$usernick?>
					</li>
					<li>
						<input type="text" name="subject" value="<?= $item_subject?>">
					</li>
				</ul>
			<div class="html">
					<input type="checkbox" name="html_ok" value="y">
					<span>html쓰기</span>
			</div>
				<textarea rows="15" cols="79" name="content"><?= $item_content?></textarea>
				<ul class="img_plus">
					<li>
						<div>
								<label for="file1">파일 찾기</label>
								<span>파일을 선택해주세요.</span>
								<input class="return" type="file" id="file1" name="upfile[]">
						</div>
							<? if ($mode=="modify" && $item_file_0)
								{
							?>
							<div class="delete_ok">
								<p><?=$item_file_0?> 파일이 등록되어 있습니다.</p>
								<input type="checkbox" name="del_file[]" value="0">
								<span>삭제</span>
							</div>
					</li>
							<?
								}
							?>
					<li>
							<div>
								<label for="file2">파일 찾기</label><span>파일을 선택해주세요.</span>
								<input class="return" type="file" id="file2" name="upfile[]">
							</div>
						<? 	if ($mode=="modify" && $item_file_1)
							{
						?>
						<div class="delete_ok">
							<p><?=$item_file_1?> 파일이 등록되어 있습니다.</p>
							<input type="checkbox" name="del_file[]" value="1">
							<span>삭제</span>
						</div>
					</li>
						<?
							}
						?>
					<li>
						<div>
								<label for="file3">파일 찾기</label><span>파일을 선택해주세요.</span>
								<input class="return" type="file" id="file3" name="upfile[]">
						</div>
						<? 	if ($mode=="modify" && $item_file_2)
								{
						?>	
							<div class="delete_ok">
								<p><?=$item_file_2?> 파일이 등록되어 있습니다.</p>
								<input type="checkbox" name="del_file[]" value="2">
								<span>삭제</span>
							</div>
					</li>											
						<?
							}
						?>
				</ul>

		<ul class="write_button">
			<li>
				<a href="list.php?table=<?=$table?>&page=<?=$page?>&style=<?=$style?>">목록</a>
			</li>
			<li>
				<a href="#" onclick="check_input()">저장</a>
			</li>
		</ul>

		</form>
		</div>
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
		<script src="../common/js/jquery-1.12.4.min.js"></script>
		<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
		<script>
			 $(document).on("change", ".return", function(){
   
						$filename = $(this).val();

						if(!$filename){
							$filename= "파일을 선택해주세요."
						}
						$(this).prev().text($filename);

			})
		</script>
</body>
</html>