<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
   $len = strlen($id);
    if(!$id) 
   {
      echo("<span style='color:red'>아이디를 입력하세요.</span>");
   }else if(!preg_match("/^[a-z]/i", $id)) {
      echo("<span style='color:red'>아이디의 첫글자는 영문이어야 합니다.</span>");
   }else if($len<4 || $len>8){
      echo("<span style='color:red'>아이디는 4~8자 여야 합니다.</span>");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where id='$id' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);


     
      if ($num_record)
      {
         echo "<span style='color:red'>다른 아이디를 사용하세요.</span>";
      }
      else
      {
         echo "<span style='color: #62c683'>사용가능한 아이디입니다.</span>";
      }
    
 
      mysql_close();
   }

?>

