@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>Edit: {{ $post->title }}</h2>
				@include('errors.list')
				{!! Form::model($post,['method'=>'PATCH','route'=>['post.update',$post->id]]) !!}

				@include('post._form',['submitButtonText'=>'Update Post'])

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection