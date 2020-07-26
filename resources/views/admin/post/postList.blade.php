@extends('layouts.app')

@section('title', __($title ?? __('Admin').' / '.__('Blog entries')))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header align-baseline">
                        {{ __('Admin') }} / {{ __('Blog entries') }}
                        <a class="btn btn-sm btn-success float-right" href="{{ route('admin.post.create') }}"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
                    </h4>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Tags') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="align-baseline">{{ $post->id }}</td>
                                        <td class="align-baseline">
                                            <a href="{{ route('admin.post.edit', $post->id) }}" title="{{ $post->title }}">
                                                {{ Str::limit($post->title, 55) }}
                                            </a>
                                        </td>
                                        <td class="align-baseline">
                                            @isset($post->tags)
                                                @foreach($post->tags as $tag)
                                                    <a class="badge badge-primary" href="{{ route('blog.tag', $tag->url) }}">{{ $tag->name }}</a>
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td class="align-baseline">
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.post.edit', $post->id) }}">
                                                <i class="fas fa-pencil-alt"></i></i> {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('admin.post.destroy', $post->id) }}" class="d-inline-block" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}');"><i class="fas fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">{{ __('No data to display. :(') }}</td>
                                    </>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
