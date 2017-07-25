@extends('main')

@section('title', '| Delete Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Are you sure you wanna delete it?</h1>
			<p>
				<strong>Name: {{$comment->name}}</strong><br>
				<strong>Email: {{$comment->email}}</strong><br>
				<strong>Comment: {{$comment->comment}}</strong><br>
			</p>

			{{Form::open(['route' => ['comments.destroy', $comment->id ], 'method' => 'DELETE'])}}
				{{Form::submit('Delete', ['class' => 'btn btn-lg btn-danger'])}}
			{{Form::close()}}
		</div>
	</div>
@stop