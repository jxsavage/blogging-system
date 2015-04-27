<div class = "row article-admin">

    <div class = "col-xs-6">
        <button class="btn btn-primary btn-admin-edit" type="button" data-toggle="collapse" data-target="#editCollapse{{$article->id}}" aria-expanded="false" aria-controls="editCollapse{{$article->id}}">
            <span class="glyphicon glyphicon-pencil"aria-hidden="true"></span>
            Edit
        </button>
    </div> <!--end col-md-10-->

    <div class = "col-xs-2 text-right">
        {!! Form::open(['route' => ['article.delete', $article->id],
        'method' => 'delete', 'data-target' => '#article-container-'.$article->id, 'class' => 'ajax-form']) !!}
            <button type="submit" class="btn btn-danger btn-admin-delete">
                <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                Delete
            </button>
        {!! Form::close() !!}
    </div> <!--end col-md-2-->

</div><!--End row-->

<div class="collapse" id="editCollapse{{$article->id}}">
    <div class="well">
        {!! Form::open(['route' => ['article.update', $article->id], 'method' => 'put', 'data-target' => '#article-'.$article->id, 'class' => 'ajax-form']) !!}

            @include('blog.partials.articleForm', [$article, $tags])

            <div class = "form-group">
                {!! Form::submit('Update Article',
                ['class' => 'btn btn-primary btn-update-article']) !!}
                    <button class="btn btn-danger btn-admin-cancel" type="button" data-toggle="collapse" data-target="#editCollapse{{$article->id}}" aria-expanded="false" aria-controls="editCollapse{{$article->id}}">
                    <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                    Cancel
                </button>
            </div>

        {!! Form::close() !!}
    </div>
</div><!-- End Collapse -->
