<? session_start();
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	$table = "news";
	$ripple = "free_ripple";
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
		<link rel="stylesheet" href="./css/list.css">
    <script src="https://kit.fontawesome.com/39dad5f800.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <title>삼천리 - 고객센터</title>
</head>
<?
	include "../lib/dbconn.php";
				// 한 화면에 표시되는 글 수
	if(!$scale)$scale=3;
	if(!$style)$style='normal';
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
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
        <!-- 본문 콘텐츠 영역 -->
        <div class="contentArea">
					<h2>NEWS</h2>
				<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search&style=<?=$style?>&page=<?=$page?>"> 
						<div class="list_search">
								<p class="list_search1">총 <span><?= $total_record ?></span> 개의 새 소식이 있습니다</p>
								<div class="list_search2">
										<select name="find">
																<option value='subject'>제목</option>
																<option value='content'>내용</option>
																<option value='nick'>별명</option>
																<option value='name'>이름</option>
										</select>
										<input type="text" name="search" value="검색어 입력">
										<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
									</div>
									<div class="list_count">
										<ul class="css_change">
											<li><a href="./list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>&style=normal"><i class="fa-solid fa-list"></i></a></li>
											<li><a href="./list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>&style=css"><i class="fa-solid fa-table-cells-large"></i></a></li>
										</ul>
										<label for="scale" class="hidden">리스트 개수</label>
										<select id="scale" name="scale" onchange="location.href='list.php?page=<?=$page?>&style=<?=$style?>&scale='+this.value">
											<option value='2'><?=$scale?>개 씩</option>
											<option value='2'>2개씩 보기</option>
											<option value='3'>3개씩 보기</option>
											<option value='4'>4개씩 보기</option>
											<option value='5'>5개씩 보기</option>
										</select>
								</div>	
							</div>
					</form>
					<?if($style=='css'){?>
						<ul class="newsContent other">
							<?}else{?>
								<ul class="newsContent">
							<?}?>
					<?		
				for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
				{
						mysql_data_seek($result, $i);       
						// 가져올 레코드로 위치(포인터) 이동  
						$row = mysql_fetch_array($result);       
						// 하나의 레코드 가져오기
				
					$item_num     = $row[num];
					$item_id      = $row[id];
					$item_name    = $row[name];
					$item_nick    = $row[nick];
					$item_hit     = $row[hit];
					$item_content = $row[content];
						$item_date    = $row[regist_day];
					$item_date = substr($item_date, 0, 10);  

					$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

					if($row[file_copied_0]){
						$item_img = '../../concert/data/'.$row[file_copied_0];
					}else{
						$item_img = '../../concert/data/default.jpg';
					}
						//덧글 불러오는 곳
					$sql = "select * from $ripple where parent=$item_num";
					$result2 = mysql_query($sql, $connect);
					$num_ripple = mysql_num_rows($result2); // 해당 게시글의 덧글 개수

		?>		
					<li>
						<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>&style=<?=$style?>">
							<div class="newsInner">
								<span>No <?= $number ?></span>
								<h3><?= $item_subject ?><span>
<?
								if($num_ripple)echo "[$num_ripple]"
?>							
								</span>
							</h3>
								<ul>
									<li>
										<?= $item_nick ?>
									</li>
								</ul>
								<p><?= $item_content?></p>
							</div>
						</a>
					</li>
		<?
					$number--;
			}
		?>
			</ul>
				<div id="page_button">
					<div id="page_num">
					 <span>이전</span> 
	<?
		// 게시판 목록 하단에 페이지 링크 번호 출력
		for ($i=1; $i<=$total_page; $i++)
		{
			if ($page == $i)     // 현재 페이지 번호 링크 안함
			{
				echo "<b> $i </b>";
			}
			else
			{ 
				echo "<a href='list.php?table=$table&page=$i&scale=$scale&style=$style'> $i </a>";
			}      
		}
?>			
				<span>다음</span>
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>&style=<?=$style?>">목록</a>
<? 
	if($userid)
	{
?>
						<a href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>&style=<?=$style?>">글쓰기</a>	
<?
	}
?>
				</div>
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
</body>
</html>