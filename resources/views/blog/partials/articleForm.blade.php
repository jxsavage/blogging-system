


<div class = "form-group">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    {!! Form::text('meta_description',
    isset($article->meta_description) ? $article->meta_description : null,
    ['class' => 'form-control']) !!}
</div>
<div class = "form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',
    isset($article->title) ? $article->title : null,
    ['class' => 'form-control']) !!}
</div>
<div class = "form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content',
    isset($article->content) ? $article->content : null,
    ['class' => 'form-control']) !!}
</div>
<div class = "form-group">
    {!! Form::label('publish_on', 'Publish On:') !!}
    <div class='input-group date txt-form-short' id='datetimepicker{{isset($article->publish_on) ? $article->publish_on : null}}'>
        {!! Form::text('publish_on',
        isset($article->publish_on) ? $article->publish_on : null,
        ['class' => 'form-control']) !!}
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<div class = "form-group">
    {!! Form::label('tags', 'Article Tags:')!!}
    <br/>
    @foreach($tags as $tag)
        <div class = "tag-check-box no-wrap">
        {!! Form::label($tag->tag) !!}
        {!! Form::checkbox('tags[]', $tag->id, isset($article) ? $article->hasTag($tag->tag) : false) !!}
        </div>
    @endforeach
</div>

<div class = "form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manage-tags-modal">
      Manage Tags
    </button>
</div>

<div class = "form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manage-pictures-modal-{{$article->id}}">
      Manage Pictures
    </button>
</div>
