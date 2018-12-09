<?php
	/*
	
	회원정보를 수정할 수 있는 폼 페이지를 만들어 준다.


	*/


?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once("../html_head.php"); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php

	require_once("MemberDao.php");
	require_once("tools.php");
	/*
	이 회원정보 수정 요청을 한 사용자의 원래 정보를 어떻게 알지?
	*/

	session_start();
	$uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";

	/* uid를 가지고 데이터베이스 질의해야지... 이 id를 가진 회원 정보를 가져오라고 */

	$mdao = new MemberDao();
	$member = $mdao->getMember($uid);
	if(!$member){
		errorBack("그런사람 또 없습니다.");
		exit();
	}

	?>

  <?php require_once("../header.php"); ?>
  <?php require_once("../menu.php");  ?>
   <div class="container">
  <h2>회원정보 수정</h2>
  <form action="update.php" method="POST">
    <div class="form-group">
      <label for="usr">ID:</label>
      <input type="text" class="form-control" name="id"readonly value="<?= $member["id"]?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" value="<?= $member["pw"]?>">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="pwd" name="name" value="<?= $member["name"]?>">
    </div>
    <div class="form-group">
      <label for="nickname">Nickname:</label>
      <input type="text" class="form-control" id="pwd" name="nickname" value="<?= $member["nickname"]?>">
    </div>
    <button type="submit" class="btn btn-primary">수정</button>
  </form>
</div>
  <?php require_once("../footer.php"); ?>
</body>
</html>