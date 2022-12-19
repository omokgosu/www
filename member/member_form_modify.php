<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삼천리 - 회원정보수정</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./css/member_form.css">
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
    <header> 
        <h1>
            <a href="../index.html">삼천리 로고</a>
        </h1>
    </header> 
   <article id="content">
    <h2>회원정보수정</h2>
    <p><span>*</span>은 필수 입력 사항입니다.</p>
     <form  name="member_form" method="post" action="modify.php">
         <ul>
             <li>
                 <dl>
                     <dt><label for="id">아이디</label></dt>
                     <dd><input type="text" name="id" id="id" value="<?= $row[id] ?>" required readonly></dd>
                 </dl>
             </li>
             <li>
                 <dl>
                     <dt><label for="pass">비밀번호</label></dt>
                     <dd><input type="password" name="pass" id="pass" required></dd>
                 </dl>
             </li>
             <li>
                 <dl>
                     <dt><label for="pass_confirm">비밀번호확인</label></dt>
                     <dd><input type="password" name="pass_confirm" id="pass_confirm"  required></dd>
                 </dl>
             </li>
             <li>
                 <dl>
                     <dt><label for="name">이름</label></dt>
                     <dd><input type="text" name="name" id="name" value="<?= $row[name] ?>" required></dd>
                 </dl>
             </li>
             <li>
                 <dl>
                     <dt><label for="nick">닉네임</label></dt>
                     <dd><input type="text" name="nick" id="nick"  value="<?= $row[nick] ?>" required><span id="loadtext2"></span></dd>
                 </dl>
             </li>
             <li class="hp">
                 <dl>
                     <dt><span>H.P</span></dt>
                     <dd>
                         <select class="hp" name="hp1" id="hp1"> 
                             <option value='010' <? if($hp1=='010') echo 'selected'; ?>>010</option>
                             <option value='011' <? if($hp1=='011') echo 'selected'; ?>>011</option>
                             <option value='016' <? if($hp1=='016') echo 'selected'; ?>>016</option>
                             <option value='017' <? if($hp1=='017') echo 'selected'; ?>>017</option>
                             <option value='018' <? if($hp1=='018') echo 'selected'; ?>>018</option>
                             <option value='019' <? if($hp1=='019') echo 'selected'; ?>>019</option>
                         </select>
                         <strong>-</strong>
                         <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>" required>
                         <strong>-</strong>
                         <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>"  required>
                     </dd>
                 </dl>
             </li>
             <li class=mail>
                 <dl>
                     <dt><span>이메일</span></dt>
                     <dd>
                         <label class="hidden" for="email1">이메일아이디</label>
                         <input type="text" id="email1" name="email1" value="<?= $email1 ?>" required>
                         <span>@</span>
                         <label class="hidden" for="email2">이메일주소</label>
                         <input type="text" name="email2" id="email2" value="<?= $email2 ?>" required>
                     </dd>
                 </dl>
             </li>
             <div class="button">
                 <a href="#" onclick="check_input()">회원정보수정</a>
                 <a href="../index.html" onclick="reset_form()">취소하기</a>
             </div>
         </ul>
     </form>
   </article>
<script src="./js/jquery-1.12.4.min.js"></script>
<script src="./js/jquery-migrate-1.4.1.min.js"></script>
<script>
     //nick 중복검사		 
     $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
                var nick = $('#nick').val();

                $.ajax({
                    type: "POST",
                    url: "check_nick.php",
                    data: "nick="+ nick,  
                    cache: false, 
                    success: function(data)
                    {
                        $("#loadtext2").html(data);
                    }
                });
            });		 
   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "<?=$userid?>";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "<?= $row[name] ?>";
      document.member_form.nick.value = "<?= $row[nick] ?>";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "<?= $hp2 ?>";
      document.member_form.hp3.value = "<?= $hp3 ?>";
      document.member_form.email1.value = "<?= $email1 ?>";
      document.member_form.email2.value = "<?= $email2 ?>";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</body>
</html>
