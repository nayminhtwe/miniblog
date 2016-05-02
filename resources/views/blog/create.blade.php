@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>Create the Blog</h2>
				@if (count($errors) > 0)
    			<div class="alert alert-danger">
        		<ul>
            	@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            	@endforeach
        		</ul>
    			</div>
				@endif
				<form action="{{ route( "blog.store") }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<div class="form-group">
   					<label for="title">Blog Title</label>
    				<input type="text" class="form-control" id="title" placeholder="Enter Blog Title" name="title" value="{{ old('title') }}">
  					</div>

  					<div class="form-group">
    				<label for="body">Body</label>
    				<textarea class="form-control" id="body" placeholder="Enter Blog Body" rows="8" name="body">{{ old('body') }}</textarea>
  					</div>

  					<div class="form-group">
   					<label for="category">Category</label>
    				<input type="text" class="form-control" id="category" placeholder="Enter Blog category" name="category" value="{{ old('category') }}">
  					</div>

  					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection