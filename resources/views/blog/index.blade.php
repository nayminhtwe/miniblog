@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 align="center">All Blogs</h1>

				<a type="button" class="btn btn-primary btn-lg" href="{{ route("blog.create") }}">Create Blog</a>
				@foreach($blogs as $blog)
				<h2><a href="{{ action('BlogController@show', [$blog->id] ) }}">{{ $blog->title }}</a></h2>
				<p>{{ $blog->body  }}</p>
				<p>{{ $blog->category }}</p>

				
				<form method="POST" action="{{ route("blog.destroy", $blog->id) }}" accept-charset="UTF-8">
				<a type="button" class="btn btn-primary" href="{{ action('BlogController@edit', [$blog->id] ) }}">Edit</a>
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="btn btn-default" value="Delete">
				</form>
				<hr>
				 
				@endforeach
				{!! $blogs->render() !!}
			</div>
		</div>
	</div>
@endsection