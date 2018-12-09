<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

	a:hover{text-decoration: none};
	</style>
	<?php require_once("html_head.php"); ?>
</head>
<body>
	<?php require_once("header.php"); ?>
	<?php require_once("menu.php"); ?> 
	<div class="jumbotron">

	</div>
	<table class="table">
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>작성일시</th>
			<th>조회수</th>
		</tr>
	<?php

	require_once("boardDao.php");
	require_once("tools.php");
		/*
		DB에서 게시글 리스트를 2차원 배열로 가져온다.
		[['Num=>1, 'Title' => '게시글','Writer' => 'scpark','Regtime' =>'2018.10.01','Hits' =>0],
		[2, '안녕', 'scpark', '....',0],
		[...],
		[...],
		[...]]
		
		$msgs = DB에서 2차원 연관 배열 형태로 가져 온 각 게시글에 대해

		foreach($msgs as $msg){
			foreach($msg as $val){
	
			}
	
		}


		*/

		$dao = new boardDao();
		$msgs = $dao->getManyMsgs();

	/*	 foreach($msgs as $msg){
			echo "<tr>";
			echo "<td>", $msg["Num"], "</td>";
			echo "<td>", $msg["Title"], "</td>";
			echo "<td>", $msg["Writer"], "</td>";
			echo "<td>", $msg["Regtime"], "</td>";
			echo "<td>", $msg["Hits"], "</td>";
			echo "</tr>";
		}
		*/


		$page = requestValue("page");
		if($page <1)
			$page = 1;


		$dao = new boardDao();

		$startRecord = ($page-1)*10;
		$msgs = $dao->getPageMsgs($startRecord,10);


	?>




		@foreach($msgs as $msg)
		<tr>
			<td>{{$msg["Num"] }}</td>
			<td><a href="view?num={{ $msg["Num"] }}">{{$msg["Title"] }}</a></td>
			<td><{{ $msg["Writer"] }}</td>
			<td><{{ $msg["Regtime"] }}</td>
			<td><{{ $msg["Hits"] }}</td>
		</tr>
		@endforeach
	</table>
	<button onclick="location.href='write_form.php'" class="btn btn-primary">글 쓰기</button>
		<?php require_once("footer.php"); ?>
</body>
</html>