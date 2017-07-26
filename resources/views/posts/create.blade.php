@extends('main')

@section('title', '| Create new post')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e2xfioyucn0n9nv2vmr8ie7vlwam911c1fn327czx2f3mguf"></script>

<script>
    tinymce.init({
        selector: "textarea",
        plugins: [
          "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
        ]
    });
</script>

@section('content')
	<div class="row">
		<div class="col-md-8 col-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
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
                {{Form::label('featured_image', 'Upload Featured Image')}}
                {{Form::file('featured_image')}}
    			<hr>
    			{{Form::label('body', "Post Body:")}}
    			{{Form::textarea('body', null, array('class' => 'form-control'))}}
				<hr>
    			{{Form::submit('Create Post', array('class' => 'btn btn-success btn-lg'))}}
			{!! Form::close() !!}
		</div>
	</div>
@endsection