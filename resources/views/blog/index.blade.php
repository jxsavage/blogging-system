@extends('app')



@section('header')
@if( ! \Auth::guest())
    @if (\Auth::user()->hasRole(['owner', 'admin']))
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/blog/admin.css')}}" rel="stylesheet" type="text/css">
    @endif
@endif
@stop

@section('content')


@if( ! \Auth::guest())
    @if (\Auth::user()->hasRole('owner'))

        @include('blog.partials.manageTagModal', $tags)
        <div id="manage-pictures-container">
            @foreach($articles as $article)
                @include('blog.partials.manageArticlePictureModal', ['articlePictures' => $article->articlePictures])
            @endforeach
        </div><!--end manage-picture-container-->

    @endif
@endif

<div class="container">

    <h1>Articles</h1>

    @if ( ! \Auth::guest())
        @if (\Auth::user()->hasRole(['owner', 'admin']))

            <button class="btn btn-danger" id="btn-admin-hide" type="button">
                <span class="glyphicon glyphicon-eye-close"aria-hidden="true"></span>
                Hide Admin
            </button>

            <button class="btn btn-success" id="btn-admin-show" type="button">
                <span class="glyphicon glyphicon-eye-open"aria-hidden="true"></span>
                Show Admin
            </button>

        @endif
    @endif

    <div id="articles-container">

        @foreach ($articles as $article)
            <div id="article-container-{{$article->id}}">
                @if( ! \Auth::guest())
                    @if (\Auth::user()->hasRole('owner'))

                        @include('blog.partials.articleUpdate', [$article, $tags])

                    @endif
                @endif

                @include('blog.partials.article', $article)
            </div> <!--end article-container-{{$article->id}} -->
        @endforeach

    </div> <!-- end article-container !-->

</div> <!-- end container !-->

@stop

@section('footer')
@if( ! \Auth::guest())
    @if (\Auth::user()->hasRole('owner'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="{{asset('/vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('/js/blog/create.js')}}"></script>
        <script src="{{asset('/js/blog/admin.js')}}"></script>
    @endif
@endif
@stop
