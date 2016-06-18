<div class="form-group">
    {!! Form::label('title','Post Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Body:') !!}
    @include('tinymce::tpl')
    {!! Form::textarea('body',null,['class'=>'tinymce']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','multiple']) !!}

</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>


