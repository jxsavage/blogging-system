@extends('app')
@include('blog.partials.articleForm')
@section('header')
<link rel="stylesheet" href="{{asset('/vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container">
    <h1>Write a New Article</h1>
    <hr/>
    @yield('articleForm')
</div> <!-- end container !-->
@stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="{{asset('/vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('/js/blog/create.js')}}"></script>
@stop
