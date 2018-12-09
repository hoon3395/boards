<?php
	require_once("tools.php"); // 부모폴더로 부터 tools.php를 찾기위해 ../를 붙임
	require_once("boardDao.php");
	/*
		1. 요청 정보에서 작성자, 제목, 내용을 추출
			1.1 정보가 부족해 (입력을 다 안했어...)
				1.1.1 에러 메시지 출력 & back
			1.2 정보가 다 있으면
			1.2.1 추출한 정보를 db에 insert
			1.2.2 성공 메시지 출력
			1.2.3 게시판의 메인 페이지로 이동(board.php)
	*/
	$title = requestValue("title"); //isset 문장을 tools.php의 requestValue 함수로 만들어 놓음
	$writer = requestValue("writer");
	$content = requestValue("content");

	if($title && $writer && $content){
		//DB insert
		$dao = new boardDao();
		$dao->insertMsg($title,$writer,$content);
		okGo("정상적으로 입력되었습니다", "board.php");
	}else{
		errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
	}

?>