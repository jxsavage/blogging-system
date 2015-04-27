<div class = "row" id="article-{{$article->id}}">
    @if ($article->articlePictures->count())
    <div class="col-xs-4">
        @include('blog.partials.articlePicture',
                    ['articlePictures' => $article->articlePictures])
    </div>
    @endif
    <div class="col-xs-{{$article->articlePictures->count() ? 8 : 12}}">
        <h2>
            <a href='/blog/article/{{$article->present()->linkTitle()}}'>
                {{$article->title}}
            </a>
        </h2>

        <p>{{$article->content}}</p>
        <span>Published on: {{$article->publish_on}}</span>
        <br>
        <span>Published by:
            <a href='/blog/user/{{$article->user->user_name}}'>
                {{$article->user->user_name}}
            </a>
        </span>
        <br>
        <span>Tags:
            @foreach ($article->tags as $tag)
                <a href='/blog/tag/{{$tag->tag}}'>{{$tag->tag}}</a>
            @endforeach
        </span>
    </div>
</div><!-- end article -->

<hr/>
