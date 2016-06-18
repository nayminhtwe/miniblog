@extends("master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12"></div>
        <h2>Edit the Tag: {{ $tag->name }}</h2>
        @include('errors.list')
        <form action="{{ route("tag.update", $tag->id) }}" method="post">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Tag name" name="name" value="{{ $tag->name }}">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="{{ $tag->description }}">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection