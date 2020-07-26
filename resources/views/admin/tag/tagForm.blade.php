@push('styles')
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
        <label class="required" for="name">{{ __('Name') }}</label>
        <input class="form-control" id="name" minlength="3" maxlength="32" name="name" required type="text"
            value="{{ old('name', $tag->name ?? '') }}">
        <small id="nameHelpBlock" class="form-text text-muted">
            {{ __('The :attribute must be between :min and :max.', ['attribute' => __('Name'), 'min' => 3, 'max' => 32]) }}
        </small>
    </div>
    <div class="form-group pt-3">
        <div class="form-text text-muted"><em class="required">*</em>: {{ __('Required fields') }}</div>
    </div>
    <div class="form-group pt-2">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{ __('Save') }}</button>
        <a class="btn btn-secondary" href="{{ route('admin.tag.index') }}">
            <i class="fas fa-times"></i> {{ __('Cancel') }}
        </a>
    </div>
</form>
