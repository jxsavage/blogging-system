@if ( $articlePictures->count() > 1 )

<div id="article-carousel-{{$articlePictures->first()->article_id}}" class="carousel slide margin-top-25" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @for ( $i = 0; $i < $articlePictures->count(); $i++ )
            @if($i === 0)
                <li data-target="#article-carousel-{{$articlePictures->first()->article_id}}"
                    data-slide-to="{{$i}}" class="active"></li>
            @else
            <li data-target="#article-carousel-{{$articlePictures->first()->article_id}}"
                data-slide-to="{{$i}}"></li>
            @endif
        @endfor
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @for ( $i = 0; $i < $articlePictures->count(); $i++ )
            @if($i === 0)
                <div class="item active">
                    <div class="row">
                        <div class="col-xs-12 article-div-picture" style="background-image: url({{$articlePictures[$i]->url}})">
                        </div>
                    </div>
                    <div class="carousel-caption">
                        <!-- may place picture caption here -->
                    </div>
                </div>
            @else
                <div class="item">
                    <div class="col-xs-12 article-div-picture" style="background-image: url({{$articlePictures[$i]->url}})">
                    </div>
                    <div class="carousel-caption">
                        <!-- may place picture caption here -->
                    </div>
                </div>
                <!-- may place carousel title here -->
            @endif
        @endfor
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#article-carousel-{{$articlePictures->first()->article_id}}" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#article-carousel-{{$articlePictures->first()->article_id}}" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@else

<div class="row add-bootstrap-column-padding margin-top-25">
    <div class="col-xs-12 article-div-picture" style="background-image: url({{$articlePictures->first()->url}})">
    </div>
</div>

@endif
