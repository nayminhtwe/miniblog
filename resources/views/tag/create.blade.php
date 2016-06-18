@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>Create the Tag</h2>
				@include('errors.list')
				<form action="{{ route( "tag.store") }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<div class="form-group">
   					<label for="name">Tag Name</label>
    				<input type="text" class="form-control" id="name" placeholder="Enter Tag name" name="name" value="{{ old('name') }}">
  					</div>


					<div class="form-group">
   					<label for="description">Description</label>
    				<input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="{{ old('description') }}">
  					</div>

  					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection