@extends("master")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h1 align="center">Category Archive: {{ $catname->name }}</h1>


                @foreach($catblog as $blog)
                    <h2><a href="{{ action('BlogController@show', [$blog->id] ) }}">{{ $blog->title }}</a></h2>
                    <p>{{ $blog->body  }}</p>
                    <p>{{ $blog->category }}</p>

                    <hr>

                @endforeach
                {!! $catblog->render() !!}

            </div>
        </div>
    </div>
@endsection