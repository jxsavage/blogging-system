<div class="row" id="picture-article-{{$articlePicture->article_id}}">
    <div class="col-xs-12 article-div-picture" style="background-image: url({{$articlePicture->url}})">
        {!! Form::open(['route' => ['articlePicture.destroy', $articlePicture->id],
                                 'method' => 'delete', 'class' => 'inline', 'data-target' => '#picture-article-'.$articlePicture->article_id, 'class' => 'ajax-form']) !!}
            <button type="submit" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
            </button>
        {!! Form::close() !!}
    </div>
</div>
