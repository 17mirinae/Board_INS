<?php
	header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<head>
	<style>
		body {
			background-image: url('./Paris_Sky.jpg');
			background-size: 100%;
			background-repeat: repeat;
			text-align: center;
		}
		th {
			text-align: center;
			background-color: lightblue;
		}
		td {
			text-align: center;
			background-color: honeydew;
		}
	</style>
</head>
<body>
        <h1 align= center>Login</h1><hr><br>
	<form method='post' action='Login_Ok.php'>
	<table border = 1 align = center>
		<tr>
			<td>아이디: </td>
			<td><input type="text" name="userId"></td>
		</tr>
		<tr>
			<td>비밀번호: </td>
			<td><input type="password" name="userPwd"></td>
		</tr>
	</table><br><br>
	<input type='submit' value='확인'> <input type='submit' value='회원가입'>
	</form>
</body>
</html>
