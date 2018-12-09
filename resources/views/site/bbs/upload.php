

	<?php require_once("../html_head.php"); ?>
		<?php require_once("../header.php"); ?>
	<?php require_once("../menu.php");	?>
<div class="form-group">
		<label for="content">
		제목 :
		</label>
		<input type="text" name="title" required> 
		</div>

		<div class="form-group">
		<label for="writer">
		작성자 :
		</label>
		<input type="text" name="writer" required>
		</div>

		<div class="form-group">
		<label for="content">
		내용 :
		</label>
		<textarea rows="5" id="content" name="content" required>
		</textarea>
		</div>


		<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
	<input type='file' name='myfile'>
	<button>Upload</button>
</form>
	<?php require_once("../footer.php"); ?>