<? 
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>삼천리 - 회원가입</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/member_form.css">
</head>
<body>
    <header> 
        <h1>
            <a href="../index.html">삼천리 로고</a>
        </h1>
    </header>        
	<article id="content">  
	    <h2>회원가입</h2>
        <p><span>*</span>은 필수 입력 사항입니다.</p>
        <form  name="member_form" method="post" action="insert.php"> 	
            <ul>
                <li>
                    <dl>
                        <dt><label for="id">아이디</label></dt>
                        <dd><input type="text" name="id" id="id" required><span id="loadtext"></span></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="pass">비밀번호</label></dt>
                        <dd><input type="password" name="pass" id="pass" required></dd>
                        <dd><span id="loadtext3"></span></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="pass_confirm">비밀번호확인</label></dt>
                        <dd><input type="password" name="pass_confirm" id="pass_confirm"  required></dd>
                        <dd><span id="loadtext4"></span></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="name">이름</label></dt>
                        <dd><input type="text" name="name" id="name"  required></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="nick">닉네임</label></dt>
                        <dd><input type="text" name="nick" id="nick"  required><span id="loadtext2"></span></dd>
                    </dl>
                </li>
                <li class="hp">
                    <dl>
                        <dt><span>H.P</span></dt>
                        <dd>
                            <select class="hp" name="hp1" id="hp1"> 
                                <option value='010'>010</option>
                                <option value='011'>011</option>
                                <option value='016'>016</option>
                                <option value='017'>017</option>
                                <option value='018'>018</option>
                                <option value='019'>019</option>
                            </select>
                            <strong>-</strong>
                            <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required>
                            <strong>-</strong>
                            <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required>
                        </dd>
                    </dl>
                </li>
                <li class=mail>
                    <dl>
                        <dt><span>이메일</span></dt>
                        <dd>
                            <label class="hidden" for="email1">이메일아이디</label>
                            <input type="text" id="email1" name="email1"  required>
                            <span>@</span>
                            <label class="hidden" for="email2">이메일주소</label>
                            <input type="text" name="email2" id="email2"  required>
                        </dd>
                    </dl>
                </li>
                <div class="button">
                    <a href="#" onclick="check_input()">회원가입</a>
                    <a href="../index.html" onclick="reset_form()">취소하기</a>
                </div>
            </ul>
        </form>
	</article>
     <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            //id 중복검사
            $("#id").keyup(function() {    // id입력 상자에 id값 입력시
                var id = $('#id').val(); //aaa

                $.ajax({
                    type: "POST",
                    url: "check_id.php",
                    data: "id="+ id,  
                    cache: false, 
                    success: function(data)
                    {   
                        $("#loadtext").html(data); 
                    }
                });
            });
		 
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
        //비밀번호 유효성 검사
        $('#pass').keyup(function(){
            var pass = $('#pass').val();

            $.ajax({
                type: "POST",
                url: "check_pass.php",
                data: "pass="+pass,
                cache: false,
                success: function(data)
                {
                    $('#loadtext3').html(data);
                }
            });
        });
        $('#pass_confirm').keyup(function(){
            var pass = $('#pass').val();
            var pass_confirm = $('#pass_confirm').val();
            if(pass==pass_confirm && pass.length>8){
                $('#loadtext4').html("<span style='color: #62c683'>사용가능한 비밀번호입니다.</span>");
            }else if(pass_confirm.length>3){
                $('#loadtext4').html("<span style='color: rgba(200,0,0,.7'>비밀번호가 일치하지 않습니다.</span>");
            }else{
                $('#loadtext4').html('');
            }
        })	 
    });
    </script>
	<script>
    function check_input(){
            //아이디 유효성 검사
            if (!document.member_form.id.value)
            {
                alert("아이디를 입력하세요");    
                document.member_form.id.focus();
                return;
            }member_form
            if(document.member_form.id.value.length<4 || document.member_form.id.value.length>8){
                alert("아이디는 4~8자 여야 합니다.");
                document.member_form.id.focus();
                return;
            }
            const regExp = /^[a-z|A-Z]+$/;
            let str = document.member_form.id.value;
            if(!regExp.test(str[0])){
                alert("아이디의 첫글자는 영문이어야 합니다."); 
                document.member_form.id.focus();
                return;
            }
            if (!document.member_form.pass.value)
            {
                alert("비밀번호를 입력하세요");    
                document.member_form.pass.focus();
                return;
            }
            if (document.member_form.pass.value.length<8 || document.member_form.pass.value.length>12){
                alert("비밀번호는 8~12자리 사이로 입력하세요.");
                document.member_form.pass.focus();
                return;
            }
            const passNum = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,12}$/
            const regPass = /\s/g;
            let passStr =  document.member_form.pass.value;
            if(!passNum.test(passStr)){
                alert("비밀번호는 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
                document.member_form.pass.focus();
                return;
            }
            if (regPass.test(passStr)){
                alert("비밀번호는 공백 없이 입력하세요.");
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
                // insert.php 로 변수 전송
        }

        function reset_form()
        {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp1.value = "010";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";
            
            document.member_form.id.focus();

            return;
        }
    </script>
</body>
</html>


