<?php

	/*
		1. 클라이언트로부터 전송되어 온 num 값을 추출
		2. 그 num 값으로 DB에서 게시글 레코드를 읽고
		3. 그 읽은 레코드를 이용해서
			게시글 상세정보를 html로 만든다.
	*/
			require_once("tools.php");
			require_once("boardDao.php");
			$num = requestValue("num");

			$dao = new boardDao();
			$msg = $dao->getMsg($num);
			$dao->increaseHits($num);

?>
	<?php require_once("html_head.php"); ?>
		<?php require_once("header.php"); ?>
	<?php require_once("menu.php");	?>

	<div class="form-group">
		<label for="content">
		제목 :
		</label>
		<input type="text" name="title" value="<?=$msg["Title"] ?>" required> 
		</div>

		<div class="form-group">
		<label for="regtime">
		작성일자 :
		</label>
		<input type="text" name="regtime" value="<?=$msg["Regtime"] ?>" required>
		</div>

		<div class="form-group">
		<label for="hits">
		작성자 :
		</label>
		<input type="text" name="hits" value="<?=$msg["hits"] ?>" required>
		</div>

		<div class="form-group">
		<label for="content">
		내용 :
		</label>
		<textarea rows="5" id="content" name="content" required>
		</textarea>
		</div>

		<button onclick="processDelete(<?= $msg["Num"]?>)" class="btn-danger">삭제해버리기~</button>
	<?php require_once("footer.php"); ?>

		<script>
			function processDelete(num){
				result = confirm("Are you sure?");
				if(result){
					location.href="delete?num="+num;
				}
			}
	</script>