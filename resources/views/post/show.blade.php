@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">




				<h1>{{ $post->title }}</h1>
				{!!  $post->body  !!}
				<p>{{ $post->tag }}</p>
				@unless ($post->tags->isEmpty())
					<h5>Tags</h5>
					<ul>
						@foreach ($post->tags as $tag)
							<li>{{ $tag->name }}</li>
						@endforeach
					</ul>
				@endunless
				
			</div>
		</div>
	</div>
@endsection