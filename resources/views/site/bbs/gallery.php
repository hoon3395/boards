<?php

require_once("../member/MemberDao.php");
$mdao = new MemberDao();

$sort = isset($_REQUEST["sort"])?$_REQUEST["sort"]:"fname";
$dir = isset($_REQUEST["dir"])?$_REQUEST["dir"]:"asc";

$result = $mdao->getFileList($sort,$dir);








?>





<!DOCTYPE html>
<html>
<head>
		<?php require_once("../html_head.php"); ?>
	    <meta charset="UTF-8">
	<title></title>
</head>
<body>
		<?php require_once("../header.php"); ?>
	<?php require_once("../menu.php");	?>


<table>
	<tr>
	<th>파일명
		<a href="?sort=fname&dir=asc">정렬</a>
		<a href="?sort=fname&dir=desc">정렬</a>
	</th>

	<th>업로드
	<a href="?sort=ftime&dir=asc">정렬</a>
	<a href="?sort=ftime&dir=desc">정렬</a>
	</th>
	<th>크기</th>
	<th>삭제</th>
	</tr>

	<?php foreach($result as $row) { ?>

	<tr>
		<td class="left"><a href="uploads/<?= $row["fname"]?>"><?= $row["fname"] ?></a> </td>
		<td><?= $row["ftime"]?></td>
		<td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
		<td><a href="del_file.php?num<?= $row["num"] ?>&sort=<?=$sort ?>&dir=<?= $dir ?>"></a>X</td>
	</tr>
<?php } ?>
</table>
<button onclick="location.href='upload.php'">사진 업로드하기</button>
	<?php require_once("../footer.php"); ?>

</body>
</html>


