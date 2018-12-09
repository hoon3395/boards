<!DOCTYPE html>
<html>
<head>
	<?php require_once("../html_head.php"); ?>
  <meta charset="utf-8">

</head>
<body>

</body>
</html>

	<?php require_once("../header.php"); ?>
	<?php require_once("../menu.php");	?>






<?php

session_start();

	if(isset($_SESSION["name"])){
	echo "<h3>",$_SESSION["name"], "님 환영합니다.";
	?>
	<br>
	<button onclick="location.href='logout.php'" class="btn btn-danger">로그아웃</button>
	<button onclick="location.href='update_form.php'" class="btn btn-warning">회원정보수정</button>
	<?php
	}
	else{
		?>
		<br>
		<button onclick="location.href='login_form.php'" class="btn btn-success">로그인</button>
		<button onclick="location.href='memberForm.php'" class="btn btn-info">회원가입</button>
		<?php
	}
?>



	<?php require_once("../footer.php"); ?>


