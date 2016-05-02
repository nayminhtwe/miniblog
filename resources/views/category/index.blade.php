@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 align="center">All Categories</h1>
				<a type="button" class="btn btn-primary btn-lg" href="{{ route("cat.create") }}">Create Category</a>
				<table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->description }}</td>
							<td><a class="btn btn-info" href="{{ route("cat.edit", $category->id) }}">Edit</a></td>
							<td>
								<form method="POST" action="{{ route("cat.destroy", $category->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
							</td>
						</tr>
					
					@endforeach
					</tbody>
					</table>
				{!! $categories->render() !!}
			</div>
		</div>
	</div>
@endsection