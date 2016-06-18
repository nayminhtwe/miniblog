@extends("master")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 align="center">All Tags</h1>
				<a type="button" class="btn btn-primary btn-lg" href="{{ route("tag.create") }}">Create Tag</a>
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
					@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->id }}</td>
							<td>{{ $tag->name }}</td>
							<td>{{ $tag->description }}</td>
							<td><a class="btn btn-info" href="{{ route("tag.edit", $tag->id) }}">Edit</a></td>
							<td>
								<form method="POST" action="{{ route("tag.destroy", $tag->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
							</td>
						</tr>
					
					@endforeach
					</tbody>
					</table>
				{!! $tags->render() !!}
			</div>
		</div>
	</div>
@endsection