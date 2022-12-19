<? session_start();
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION);
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

	if(!$scale){
		$scale=10;			// 한 화면에 표시되는 글 수
	}
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

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
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
            <li class="current"><a href="../greet/list.php" class="current">공지사항</a></li>
            <li><a href="../concert/list.php">뉴스</a></li>
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
					<form  name="board_form" method="post" action="list.php?mode=search"> 
						<div class="list_search">
								<p class="list_search1">총 <span><?= $total_record ?></span> 개의 공지사항이 있습니다</p>
								<div class="list_search2">
										<select name="find">
																<option value='subject'>제목</option>
																<option value='content'>내용</option>
																<option value='nick'>별명</option>
																<option value='name'>이름</option>
										</select>
										<input type="text" name="search" placeholder="검색어 입력">
										<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
									</div>
									<div class="list_count">
										<label for="scale" class="hidden">리스트 개수</label>
										<select id="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
											<option value='8'><?=$scale?>개 씩</option>
											<option value='8'>8개씩 보기</option>
											<option value='10'>10개씩 보기</option>
											<option value='12'>12개씩 보기</option>
											<option value='14'>14개씩 보기</option>
										</select>
								</div>	
							</div>
					</form>

				<table>
					<thead>
						<tr>
							<th>번호</th>
							<th>제목</th>
							<th>글쓴이</th>
							<th>등록일</th>
							<th>조회수</th>
						</tr>
					</thead>
					<tbody>
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

						$item_date    = $row[regist_day];
					$item_date = substr($item_date, 0, 10);  

					$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

		?>		
					<tr>
						<td><?= $number ?></td>
						<td><a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject ?></a></td>
						<td><?= $item_nick ?></td>
						<td><?= $item_date ?></td>
						<td><?= $item_hit ?></td>
					</tr>
		<?
					$number--;
			}
		?>
					</tbody>
				</table>

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
				echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
			}      
		}
?>			
				<span>다음</span>
				</div>
				<div id="button">
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
<?
	}
?>
				</div>
		</article>
        <? include "../common/sub_footer.html" ?>
</body>
</html>