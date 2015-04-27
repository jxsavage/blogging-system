@for ($i = 0; $i < $tags->count(); $i++)
    @if ( ! $i % 4)
        <div class="row">
    @endif
            <div class="col-xs-3 padding-btm-10 no-wrap text-center">

                {!! Form::open(['route' => ['tag.destroy', $tags[$i]->id],
                                         'method' => 'delete', 'data-target' => '#tag-container', 'class' => 'inline ajax-form']) !!}
                <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                </button>
                {!! Form::close() !!}
                {{ $tags[$i]->tag }}

            </div><!--closing col-->
    @if ( ( ! $i % 4 and $i != 0) or ($tags->count() <= $i+1))
        </div><!--closing row-->
    @endif
@endfor
