@extends('layouts.app')

@section('title', __($title ?? __('Admin').' / '.__('Create tag')))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header align-baseline">
                        {{ __('Admin') }} / {{ __('Create tag') }}
                    </h4>

                    <div class="card-body">
                        @include('admin.tag.tagForm')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
