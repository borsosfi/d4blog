@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tags").select2({
                tags: true
            });
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
    <style type="text/css">
        form label.required:after {
            color: #cc0000;
            content: '*';
            margin-left: 3px;
        }

        form em.required {
            color: #cc0000;
        }
    </style>
@endpush

@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $formAction }}" method="POST">
    @csrf
    @isset($formMethod)
        @method($formMethod)
    @endisset
    <div class="form-group">
        <label class="required" for="title">{{ __('Title') }}</label>
        <input class="form-control" id="title" minlength="5" maxlength="255" name="title" required type="text"
            value="{{ old('title', $post->title ?? '') }}">
        <small id="titleHelpBlock" class="form-text text-muted">
            {{ __('The :attribute must be between :min and :max.', ['attribute' => __('Title'), 'min' => 5, 'max' => 255]) }}
        </small>
    </div>
    <div class="form-group">
        <label class="required" for="excerpt">{{ __('Excerpt') }}</label>
        <input class="form-control" id="excerpt" minlength="10" name="excerpt" required type="text"
            value="{{ old('excerpt', $post->excerpt ?? '') }}">
        <small id="excerptHelpBlock" class="form-text text-muted">
            {{ __('The :attribute must be at least :min.', ['attribute' => __('Excerpt'), 'min' => 10]) }}
        </small>
    </div>
    <div class="form-group">
        <label class="required" for="content">{{ __('Content') }}</label>
        <textarea class="form-control" id="content" name="content" cols="40" rows="10"
            required>{{ old('content', $post->content ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="tags">{{ __('Tags') }}</label>
        <select class="form-control" id="tags" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option
                    {{ isset($postTags) && in_array($tag->id, $postTags) ? 'selected="selected"' : '' }}
                    value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <small id="tagsHelpBlock" class="form-text text-muted">
            {{ __('You can select more than one tag or enter a new one at a time.') }}
    </div>
    <div class="form-group pt-3">
        <div class="form-text text-muted"><em class="required">*</em>: {{ __('Required fields') }}</div>
    </div>
    <div class="form-group pt-2">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{ __('Save') }}</button>
        <a class="btn btn-secondary" href="{{ route('admin.post.index') }}">
            <i class="fas fa-times"></i> {{ __('Cancel') }}
        </a>
    </div>
</form>
