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
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="../greet/css/write_form.css">
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
	<? include "../common/sub_header.html" ?>
			<div class="main">
				<img src="../sub6/common/images/main-visual.jpg" alt="">
				<h3>Service center</h3>
			</div>
			<div class="subNav">
					<ul>
							<li class="current"><a href="../greet/list.php" class="current">공지사항</a></li>
							<li><a href="./list.php">뉴스</a></li>
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
							<dd><input type="text" name="subject" value="<?= $item_subject?>"></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>내용</dt>
							<dd><input type="checkbox" name="html_ok" value="y"><span>html쓰기</span><textarea rows="15" cols="79" name="content"><?= $item_content?></textarea></dd>
						</dl>
					</li>
				</ul>
				<ul class="img_plus">
					<li>
						<div>
								<label for="file1">파일 찾기</label><span>파일을 선택해주세요.</span>
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
        <? include "../common/sub_footer.html" ?>
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