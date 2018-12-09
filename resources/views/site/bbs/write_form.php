
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
@extends('layouts.app')

@section('title')
  글쓰기
@endsection

@section('content')
  <div class="ui container">
    <h2 class="ui center aligned icon header">
      <i class="book icon"></i>
      <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">
          글 작성하기
        </font>
      </font>
    </h2>
    <div class="ui inverted segment">
      <form class="ui form" class="" action="writeStart" method="post">
        <?php echo csrf_field(); ?>
        <div class="">
          <label for="title">제목</label>
          <input class="field error" type="text" name="title" value="" required><!--required 무조건 값을 입력해라 값 입력 안하면 브라우저가 입력해라고-->
        </div>
        <div class="">
          <label for="writer">작성자</label>
          <input type="text" name="writer" value="" required>
        </div>

        <div class="field">
          <label for="content">내용</label>
          <textarea  name="content" rows="5" cols="80" required></textarea>
        </div>

        <input class="ui inverted green button" type="submit" name="" value="작성">
        <button type="button" name="button" class="ui inverted green button" onclick="location.href='project?page=1'">board</button>
      </form>
    </div>
  </div>
</body>
</html>
@endsection

