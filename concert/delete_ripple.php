<?
      session_start();
      @extract($_GET); 
      @extract($_POST); 
      @extract($_SESSION); 
      include "../lib/dbconn.php";
      // table = 'free' num=1 부모번호 view.php필요..   ripple_num= (댓글번호)
      $sql = "delete from free_ripple where num=$ripple_num";
      mysql_query($sql, $connect);
      mysql_close();

      echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num&page=$page&style=$style';
	   </script>
	  ";
?>
