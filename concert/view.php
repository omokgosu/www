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
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
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
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="../greet/css/view.css">
		<link rel="stylesheet" href="./css/view.css">
    <script src="https://kit.fontawesome.com/39dad5f800.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <title>삼천리 - 고객센터</title>
</head>
</head>
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
					<li><a href="./sub6_3.html">조회/납부</a></li>
					<li><a href="./sub6_4.html">FAQ</a></li>
			</ul>
    </div>
    <article id="content">
			<div class="titleArea">
					<div class="lineMap">
							<span>home</span> &gt; <span>고객센터</span> &gt; <strong>뉴스</strong>
					</div>
					<h2 class="off">뉴스</h2>
					<p class="off">전기를 생산하고 전력시장을 통하여 전기판매사업자에게</p>
					<p class="off">공급하는 것을 주된 목적으로 하는 사업입니다.</p>
			</div>
			<div class=contentArea>
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
				<p>
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
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
	<? include "../common/sub_footer.html" ?>
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