<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
 $(document).ready(function() {
 
  $(".btn").click(function() {
   
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "check_id2.php",
        cache: false, 
        success: function(data)
        {
            var html = "<table>";
            html+="<tr><td>아이디</td><td>이름</td><td>닉네임</td><td>핸드폰</td><td>이메일</td></tr>";

			for(var i = 0; i<data.id.length; i++){
				html += "<tr>";
				html += "<td>"+data.id[i]+"</td>";
				html += "<td>"+data.name[i]+"</td>";
				html += "<td>"+data.nick[i]+"</td>";
                html += "<td>"+data.hp[i]+"</td>";
				html += "<td>"+data.email[i]+"</td>";
				html += "</tr>";
			}
            html += "</table>";

            $("#loadtext").html(html);  
        }
      });

    });
});
</script>

</head>
<body>
	
<form  name="member_form" method="post" action=""> 
    <h2>ajax로 전체 레코드 가져오기</h2>
    <div id="loadtext"></div>
    <input type="button" class="btn" value="가져오기">
</form>
	  
</body>
</html>


