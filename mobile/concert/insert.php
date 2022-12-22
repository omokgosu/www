<? session_start(); ?>

<meta charset="utf-8">
<?
// 새글쓰기 => $table;
// 수정글쓰기 => table subject mode=modify $num $content upfile[]='파일이름.확장자' del_file[]=0/1/2
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
		/*   단일 파일 업로드 
		$upfile_name	 = $_FILES["upfile"]["name"]; 첨부된 파일의 실 이름 (dog1.jpg);
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];  첨부된 파일의 임시 확장자 .tmp;
		$upfile_type     = $_FILES["upfile"]["type"]; 첨부된 파일의 확장명
		$upfile_size     = $_FILES["upfile"]["size"]; 첨부된 파일의 용량
		$upfile_error    = $_FILES["upfile"]["error"]; 업로드가 잘 되고 있으면 (true/false);
		*/

	// 다중 파일 업로드
	$files = $_FILES["upfile"]; //배열로 리턴
	$count = count($files["name"]); // 배열의 개수
			
	$upload_dir = '../../concert/data/';

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];  //dog1.jpg
		$upfile_tmp_name[$i] = $files["tmp_name"][$i]; //dog1.tmp
		$upfile_type[$i]     = $files["type"][$i]; // image/jpeg pjpeg 
		$upfile_size[$i]     = $files["size"][$i];  //22.3kb
		$upfile_error[$i]    = $files["error"][$i]; // true
      
		$file = explode(".", $upfile_name[$i]);
		$file_name = $file[0];
		$file_ext  = $file[1];

		if (!$upfile_error[$i]) // 에러가 없으면
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;      
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 500*1024 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/pjpeg") &&
				($upfile_type[$i] != "image/png") &&
				($upfile_type[$i] != "image/x-png") )
			{
				echo("
					<script>
						alert('JPG와 GIF,png 이미지 파일만 업로드 가능합니다!');
						history.go(-1)
					</script>
					");
				exit;
			}
			// move_uploaded_file (pc 에 있는 임시 파일명 , 실제 서버에 저장될 파일 경로 )메소드 => 리턴 (true,false)
			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )  //파일을 업로드한 후 업로드가 안되었으면
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}

	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify")
	{
		$num_checked = count($_POST['del_file']); 
		$position = $_POST['del_file'];

		for($i=0; $i<$num_checked; $i++)                      // delete checked item
		{
			$index = $position[$i]; // 0 1 2
			$del_ok[$index] = "y"; // $del_ok[0]='y' $del_ok[1]='y' $del_ok[2]='y'
		}

		$sql = "select * from $table where num=$num";   // get target record
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
		{

			$field_org_name = "file_name_".$i; // file_name_.0
			$field_real_name = "file_copied_".$i; // file_copied_.0

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];
			if ($del_ok[$i] == "y") // 삭제 체크한 놈은
			{
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];
				
				$delete_path = "../../concert/data/".$delete_name;

				unlink($delete_path);

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
				mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
			}
			else
			{
				if (!$upfile_error[$i])
				{
					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행					
				}
			}

		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
		
		$sql = "update $table set subject='$subject', content='$content' where num=$num";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}
	else
	{
		if ($html_ok=="y")
		{
			$is_html = "y";
		}
		else
		{
			$is_html = "";
		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "insert into $table (id, name, nick, subject, content, regist_day, hit, is_html, ";
		$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
		$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, '$is_html', ";
		$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}

	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?style=$style&table=$table&page=$page';
	   </script>
	";
?>

  
