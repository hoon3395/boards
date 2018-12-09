<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php require_once("../html_head.php"); ?>
</head>
<body>
	<?php require_once("../header.php"); ?>
	<?php require_once("../menu.php");	?>

 
  <form action="login.php">

    <div class="form-group">
      <label for="id">id</label>
      <input type="text" class="form-control"  name="id"  required>
    </div>

    <div class="form-group">
      <label for="pw">Password</label>
      <input type="password" class="form-control" name="pw"  required>
    </div>

    <input type="submit" class="btn btn-outline-primary" value="로그인">
  </form>


	<?php require_once("../footer.php"); ?>
</body>
</html>



