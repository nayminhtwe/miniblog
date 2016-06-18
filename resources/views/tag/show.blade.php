@extends("master")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h1 align="center">Tag Archive: {{ $tag->name }}</h1>


                @foreach($posts as $post)
                    <h2><a href="{{ action('PostController@show', [$post->id] ) }}">{{ $post->title }}</a></h2>
                    {!!   $post->body  !!}


                    <hr>

                @endforeach
                {!! $posts->render() !!}

            </div>
        </div>
    </div>
@endsection