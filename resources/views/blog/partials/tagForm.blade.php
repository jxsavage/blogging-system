@section('tagForm')
{!! Form::label('tags', 'Article Tags:')!!}
@foreach($tags as $tag)
    {!! Form::checkbox('tags-checkbox[]', $tag->tag, $article->hasTag($tag->tag))
@endforeach
@stop
