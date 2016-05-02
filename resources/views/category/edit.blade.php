@extends("master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12"></div>
        <h2>Edit the Category</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("cat.update", $category->id) }}" method="post">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Category name" name="name" value="{{ $category->name }}">
            </div>


            <div class="form-group">
                <label for="category">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="{{ $category->description }}">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection