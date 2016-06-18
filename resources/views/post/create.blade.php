@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>Create the Post</h2>
				@include('errors.list')
				{!! Form::open(['route'=>'post.store']) !!}

				@include('post._form',['submitButtonText'=>'Create Post'])

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection