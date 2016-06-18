@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 align="center">All Posts</h1>

				<a type="button" class="btn btn-primary btn-lg" href="{{ route("post.create") }}">Create Post</a>
				@foreach($posts as $post)
				<h2><a href="{{ action('PostController@show', [$post->id] ) }}">{{ $post->title }}</a></h2>
				{!!   $post->body  !!}
				<p>{{ $post->tag }}</p>

				
				<form method="POST" action="{{ route("post.destroy", $post->id) }}" accept-charset="UTF-8">
				<a type="button" class="btn btn-primary" href="{{ action('PostController@edit', [$post->id] ) }}">Edit</a>
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="btn btn-default" value="Delete">
				</form>
				<hr>
				 
				@endforeach
				{!! $posts->render() !!}
			</div>
		</div>
	</div>
@endsection