@extends('main')

@section('title', '| Create new posts')

@section('content')
	<div class="row">
		<div class="col-md-8 col-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store']) !!}
    			{{Form::label('title', "Title:")}}
    			{{Form::text('title', null, array('class' => 'form-control'))}}
				<hr>
				{{Form::label('slug', "Slug:")}}
    			{{Form::text('slug', null, array('class' => 'form-control'))}}
    			<hr>
    			{{Form::label('category_id', 'Category:')}}
    			<select name="category_id" class="form-control">
    				@foreach($categories as $category)
    				<option value="{{$category->id}}">{{$category->name}}</option>
    				@endforeach
    			</select>
    			<hr>
    			{{Form::label('body', "Post Body:")}}
    			{{Form::textarea('body', null, array('class' => 'form-control'))}}
				<hr>
    			{{Form::submit('Create Post', array('class' => 'btn btn-success btn-lg'))}}
			{!! Form::close() !!}
		</div>
	</div>
@endsection