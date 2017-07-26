@extends('main')

@section('title', '| Edit it')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e2xfioyucn0n9nv2vmr8ie7vlwam911c1fn327czx2f3mguf"></script>

<script>
    tinymce.init({
  	selector: 'textarea',
  	theme: 'modern',
  	plugins: [
    	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    	'searchreplace wordcount visualblocks visualchars code fullscreen',
    	'insertdatetime media nonbreaking save table contextmenu directionality',
    	'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  	],
  	toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  	toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  	image_advtab: true,
  	templates: [
    	{ title: 'Test template 1', content: 'Test 1' },
    	{ title: 'Test template 2', content: 'Test 2' }
  	],
  	content_css: [
    	'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    	'//www.tinymce.com/css/codepen.min.css'
  	]
 });
</script>

@section('content')
	<div class="row">
		{!! Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="col-md-8">

			{{Form::label('title', 'Title')}}
			{{Form::text('title', null, ['class'=> 'form-control input-lg'])}}
			<hr>
			{{Form::label('category_id', 'Category:')}}
    			<select name="category_id" class="form-control">
    				@foreach($categories as $category)
    				<option value="{{$category->id}}">{{$category->name}}</option>
    				@endforeach
    			</select>
			<hr>
			{{Form::label('featured_image', 'Update Featured Image')}}
			{{Form::file('featured_image')}}
			<hr>
			{{Form::label('body', 'Post Body', ['class' => 'form-spacing-top'])}}
			{{Form::textarea('body', null, ['class'=> 'form-control'])}}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}
	</div><!-- end of row and form!!!
@stop