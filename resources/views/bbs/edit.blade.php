@extends('layouts.app')

@section('content')
	<form action="{{route('boards.update',['board'=>$board->id,'page'=>$page])}}" method="post">
			@csrf
			@Method('PATCH')
			<label>제목
				<input type="text" name="title" value="{{$board->title}}">
				<span>
					@if($errors->has('title')){{
					$errors->get('title')
				}}
					@endif
				</span>
			</label>
			<label>
				<textarea name="content">{{$board->content}}</textarea>
			</label>
			<button class="btn btn-primary" type="submit">수정하기</button>

	</form>
@endsection