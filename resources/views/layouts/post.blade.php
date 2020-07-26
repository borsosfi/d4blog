<div class="card border-0 my-3">
  <div class="card-body">
    <h5 class="card-title text-uppercase pb-3">
        <a href="{{ route("blog.read", $post->url) }}">{{ $post->title }}</a>
        @auth
        <a class="btn btn-outline-dark border-0" href="{{ route('admin.post.edit', $post->id) }}" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
        @endauth
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <i class="far fa-user mr-1"></i> {{ $post->user->name }}
        <i class="far fa-clock ml-3 mr-1"></i> {{ isset($post->updated_at) ? $post->updated_at->format('Y.m.d H:i') : $post->created_at->format('Y.m.d H:i') }}
        @isset($post->tags)
            <i class="fas fa-tag ml-3 mr-1"></i>
            @foreach($post->tags as $tag)
                <a class="badge badge-primary" href="{{ route('blog.tag', $tag->url) }}">{{ $tag->name }}</a>
            @endforeach
        @endisset
    </h6>
    <p class="card-text pt-3 text-justify font-weight-bold font-italic">{{ $post->excerpt }}</p>
    @isset($post->content)
        <div class="text-justify">{{ $post->content }}</div>
    @endisset
  </div>
</div>
