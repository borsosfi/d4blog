@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="col-md-12 blog-post">
        @include('layouts.post')
    </div>
@endsection
