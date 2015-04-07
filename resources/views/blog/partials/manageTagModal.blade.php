<!-- Manage Tags Modal -->
<div class="modal fade" id="manage-tags-modal" role="dialog" aria-labelledby="manageTagsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="manageTagsModalLabel">Manage Tags</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            @for ($i = 0; $i < $tags->count(); $i++)
                @if ( ! $i % 4)
                    <div class="row">
                @endif
                        <div class="col-xs-3 padding-btm-10 no-wrap text-center">

                            {!! Form::open(['route' => ['tag.destroy', $tags[$i]->id],
                                                     'method' => 'delete', 'class' => 'inline']) !!}
                            <button type="submit" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                            </button>
                            {!! Form::close() !!}
                            {{trim($tags[$i]->tag)}}

                        </div><!--closing col-->
                @if ( ( ! $i % 4 and $i != 0) or ($tags->count() <= $i+1))
                    </div><!--closing row-->
                @endif
            @endfor

            {!! Form::open(['route' => 'tag.store', 'method' => 'post']) !!}
                <div class = "input-group txt-form-short center">
                {!! Form::text('new_tag', null, ['class' => 'form-control']) !!}
                <span class="input-group-btn">
                {!! Form::submit('Add Tag', ['class' => 'btn btn-primary'])!!}
                </span>
                </div>
            {!! Form::close() !!}
          </div><!-- end container fluid-->
        </div><!-- end modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
