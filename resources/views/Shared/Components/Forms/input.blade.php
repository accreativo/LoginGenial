<label for="{{ $id }}">{{ $label }}</label>
<input
    type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
    class="form-control"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($isRequired??null) required @endif
>
