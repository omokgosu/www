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
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
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
    <? include "../common/sub_header.html" ?>
    <div class="main">
			<img src="../sub6/common/images/main-visual.jpg" alt="">
			<h3>Service center</h3>
		</div>
    <div class="subNav">
        <ul>
            <li><a href="../greet/list.php">공지사항</a></li>
            <li  class="current"><a  class="current" href="./list.php">뉴스</a></li>
            <li><a href="../sub6/sub6_3.html">조회/납부</a></li>
            <li><a href="../sub6/sub6_4.html">FAQ</a></li>
        </ul>
    </div>
    <article id="content">
			<div class="titleArea">
					<div class="lineMap">
							<span>home</span> &gt; <span>고객센터</span> &gt; <strong>뉴스</strong>
					</div>
					<h2 class="off">뉴스</h2>
					<p class="off">삼천리의 뉴스들을 모아두었습니다.</p>
					<p class="off">삼천리의 중요한 소식을들 한눈에 확인하세요.</p>
			</div>
        <!-- 본문 콘텐츠 영역 -->
        <div class="contentArea">
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
											<option value='3'><?=$scale?>개 씩</option>
											<option value='3'>3개씩 보기</option>
											<option value='6'>6개씩 보기</option>
											<option value='9'>9개씩 보기</option>
											<option value='12'>12개씩 보기</option>
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
						$item_img = './data/'.$row[file_copied_0];
					}else{
						$item_img = './data/default.jpg';
					}
						//덧글 불러오는 곳
					$sql = "select * from $ripple where parent=$item_num";
					$result2 = mysql_query($sql, $connect);
					$num_ripple = mysql_num_rows($result2); // 해당 게시글의 덧글 개수

		?>		
					<li>
						<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>&style=<?=$style?>">
							<div class="imgH">
								<img src="<?=$item_img?>"  alt="">
							</div>
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
									<li>
										<?= $item_hit ?>
									</li>
									<li>
										<?= $item_date ?>
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
					<div id="page_num">이전 
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
					다음
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
        <? include "../common/sub_footer.html" ?>
</body>
</html>