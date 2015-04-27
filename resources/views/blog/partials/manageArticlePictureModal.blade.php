<!-- Manage Pictures Modal  -->
<div class="modal fade" id="manage-pictures-modal-{{$articlePictures->first()['article_id']}}" role="dialog" aria-labelledby="managePicturessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Manage Pictures</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <div id="picture-container-article-{{$articlePictures->first()['article_id']}}">
                        @foreach ( $articlePictures as $articlePicture )
                            @include('blog.partials.manageArticlePictureModalEntry', $articlePicture)
                        @endforeach
                    </div> <!-- end picture-container-article-{{$articlePictures->first()['article_id']}} -->

                    {!! Form::open(['route' => ['article.update', $articlePictures->first()['article_id']],
                     'method' => 'put', 'files' => true, 'data-target' => '#picture-container-article-'.$articlePictures->first()['article_id']]) !!}
                        <div class="form-group" id="upload-picture-form-group-{{$article->id}}">
                            {!! Form::label('Upload Pictures:') !!}
                            {!! Form::file('pictures[]', ['class' => 'btn btn-primary', 'multiple' => true]) !!}
                            <button type="button" class="btn btn-success btn-add-photo" data-target="#upload-picture-form-group-{{$article->id}}">
                             Add Picture
                            </button>
                        </div>


                </div><!-- end container fluid-->
            </div><!-- end modal-body -->

            <div class="modal-footer">
                        {!! Form::submit('Upload Pictures', ['class' => 'btn btn-primary'])!!}
                    {!! Form::close() !!}
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
