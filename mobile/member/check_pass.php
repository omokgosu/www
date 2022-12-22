<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
   $num = preg_match('/[0-9]/u', $pass);
  $eng = preg_match('/[a-z]/u', $pass);
  $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pass);

    if(!$pass) 
   {
      echo("<span style='color: rgba(200,0,0,.7'>비밀번호를 입력하세요</span>");
   }
   else if(strlen($pass) < 8 || strlen($pass) > 12)
   {
       echo("<span style='color: rgba(200,0,0,.7'>비밀번호는 영문, 숫자, 특수문자를 혼합하여 8자리 ~ 12자리 이내로 입력해주세요.</span>");
   }else if(preg_match("/\s/u", $pass) == true)
   {
    echo("<span style='color: rgba(200,0,0,.7'>비밀번호는 공백없이 입력해주세요.</span>");
   }else if( $num == 0 || $eng == 0 || $spe == 0)
   {
    echo("<span style='color: rgba(200,0,0,.7'>영문, 숫자, 특수문자를 혼합하여 입력해주세요.</span>");
       exit;
   }
   else
   {
         echo "<span style='color: #62c683'>사용가능한 비밀번호입니다.</span>";

      mysql_close();
   }

?>



