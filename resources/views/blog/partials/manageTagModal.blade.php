<!-- Manage Tags Modal -->
<div class="modal fade" id="manage-tags-modal" role="dialog" aria-labelledby="manageTagsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="manageTagsModalLabel">Manage Tags</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="tag-container">

              @include('blog.partials.manageTagModalContent', $tags)

          </div><!-- end container fluid-->
        </div><!-- end modal-body -->
        <div class="modal-footer">
          {!! Form::open(['route' => 'tag.store', 'method' => 'post', 'data-target' => '#tag-container', 'class' => 'ajax-form']) !!}
            <div class = "input-group txt-form-short center">
            {!! Form::text('new_tag', null, ['class' => 'form-control']) !!}
            <span class="input-group-btn">
            {!! Form::submit('Add Tag', ['class' => 'btn btn-primary'])!!}
            </span>
            </div>
          {!! Form::close() !!}
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
