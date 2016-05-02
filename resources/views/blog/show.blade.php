@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				

				 	
				
				<h1>{{ $blog->title }}</h1>
				<p>{{ $blog->body  }}</p>
				<p>{{ $blog->category }}</p>
				
				 
				
				
			</div>
		</div>
	</div>
@endsection