@extends('layouts.app')

@section('title', __($title ?? 'Blog entries'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header">{{ __($title ?? 'Blog entries') }}</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.posts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
