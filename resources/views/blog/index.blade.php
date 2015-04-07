@extends('app')



@section('header')
@if( ! \Auth::guest())
    @if (\Auth::user()->hasRole('owner'))
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/blog/admin.css')}}" rel="stylesheet" type="text/css">
    @endif
@endif
@stop

@section('content')
@include('blog.partials.manageTagModal', $tags)
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
    @foreach ($articles as $article)
    @if( ! \Auth::guest())
        @if (\Auth::user()->hasRole('owner'))

        <div class = "row article-admin">

            <div class = "col-xs-6">
                <button class="btn btn-primary btn-admin-edit" type="button" data-toggle="collapse" data-target="#editCollapse{{$article->id}}" aria-expanded="false" aria-controls="editCollapse{{$article->id}}">
                    <span class="glyphicon glyphicon-pencil"aria-hidden="true"></span>
                    Edit
                </button>

            </div> <!--end col-md-10-->
            <div class = "col-xs-2 text-right">
            {!! Form::open(['route' => ['article.delete', $article->id],
                                             'method' => 'delete']) !!}
            <button type="submit" class="btn btn-danger btn-admin-delete">
                <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                Delete
            </button>
        </div> <!--end col-md-2-->
            {!! Form::close() !!}
        </div><!--End row-->
        <div class="collapse" id="editCollapse{{$article->id}}">
          <div class="well">
              {!! Form::open(['route' => ['article.update', $article->id], 'method' => 'put']) !!}

                  @include('blog.partials.articleForm', [$article, $tags])

                  <div class = "form-group">
                      {!! Form::submit('Update Article',
                          ['class' => 'btn btn-primary']) !!}
                      <button class="btn btn-danger btn-admin-cancel" type="button" data-toggle="collapse" data-target="#editCollapse{{$article->id}}" aria-expanded="false" aria-controls="editCollapse{{$article->id}}">
                          <span class="glyphicon glyphicon-remove"aria-hidden="true"></span>
                          Cancel
                      </button>
                  </div>
              {!! Form::close() !!}
          </div>
      </div><!-- End Collapse -->
        @endif
    @endif
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
        <br>
    <hr/>
    @endforeach

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
