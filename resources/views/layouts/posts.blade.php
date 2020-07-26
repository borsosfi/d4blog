@forelse ($posts as $post)
    @include('layouts.post')
@empty
    <p>{{ __('No data to display. :(') }}</p>
@endforelse
