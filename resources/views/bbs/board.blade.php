@extends('layouts.app')

@section('title')
	게시글 리스트
@endsection

@section('content')



<div class="container">	
	<table class="table table-hover">
		<tr>
			<th>번호</th>	
			<th>제목</th>
			<th>작성자</th>
			<th>작성일시</th>
			<th>조회수</th>
		</tr>
	
	
	@foreach($msgs as $msg)	
		<tr>
			<td>{{$msg["Num"]}} </td>			    
			<td><a href="view?num={{$msg["Num"]}}&page=<?= $page?>"> {{$msg["Title"] }} </a> </td>
			<td>{{$msg["Writer"]}} </td>
			<td>{{$msg["Regtime"]}} </td>
			<td>{{$msg["Hits"]}} </td>
		</tr>
	@endforeach
	</table>	
</div>
<div class="float-right" style="margin-right:50px">	
	<button class="btn btn-primary" 
		onclick="location.href='write'">글쓰기</button>
</div>

@if($startPage > 1) 
<a href="bbs?page={{$startPage - $numPageLinks}}"> 
	&lt; 
</a>
@endif

@for($i=$startPage; $i <= $endPage; $i++)
	 <a href="bbs?page={{$i}}"> 
	 	@if($i==$page)
	 		<b>
	 			{{$i}} 
	 		</b>
	 	@else
	 		{{$i}}	
	 	@endif
	</a> 

@endfor

@if ($endPage < $totalPages)
	<a href="bbs?page={{$endPage+1}}">
		&gt
	</a>	
@endif

@endsection
