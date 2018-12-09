@extends('layouts.app')

@section('content')
<div class="container">
<h3>상세목록</h3>
<table class="table">
  <tr>
    <td>제목</td>
    <td>내용</td>
    <td>작성자</td>
    <td>조회수</td>
  </tr>
  <tr>
    <td>{{$board->title}}</td>
    <td>{{$board->content}}</td>
    <td>{{$board->user->name}}</td>
    <td>{{$board->hits}}</td>
  </tr>
</table>
<hr>
<h3>comment_list</h3>
<table class="table">
  <tr>
    <th>작성자</th>
    <th>내용</th>
  </tr>
  @foreach($board->comments as $c)
    <tr>
       <td>{{$c->user->name}}</td>
       <td>{{$c->content}}</td>
    </tr>
  @endforeach
</table>
<div class="row">
  <button type="button" name="button" onclick="location.href='{{route('boards.index',['page'=>$page])}}'">목록보기</button>
  @if(Auth::user()->id == $board->user_id)
  <button type="button" name="button" onclick="location.href='{{route('boards.edit',['board'=>$board->id])}}'">수정</button>
  <button type="button" name="button" onclick="location.href='boards.destroy'">삭제</button>
  @endif
</div>
</div>
@endsection