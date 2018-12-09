<?php

	$errMsg ="업로드 실패!";

	if($_FILES["upload"]["error"] == UPLOAD_ERR_OK){
		$tname = $_FILES["upload"]["tmp_name"];
		$fname = $_FILES["upload"]["name"];
		$fsize = $_FILES["upload"]["size"];

		$save_name = iconv("utf-8","cp949",$fname);

		if(file_exists("uploads/$save_name"))
			$errMsg = "이미 업로드한 파일입니다.";
		else if(move_uploaded_file($tname, "uploads/$save_name")){
			require("MemberDao.php");
			$mdao = new MemberDao();
			$mado->addFileInfo($fname, date("Y-m-d H:i:s"), $fsize);

			header("Location: upload.php?sort=$_REQUEST[sort]". "$dir=$_REQUEST[dir]");

			exit();
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

	<script>
		alert('<?= $errMsg ?>');
		history.back();
	</script>

</body>
</html>