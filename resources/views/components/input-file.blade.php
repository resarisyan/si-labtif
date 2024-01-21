@props(['disabled' => false, 'value', 'error' => false])
<div class="form-control-wrap">
    <div class="form-file">
        <input {{ $disabled ? 'disabled' : '' }} type="file" {!! $attributes->merge(['class' => 'form-file-input']) !!}>
        <label class="form-file-label" for="{{  $attributes->get('id') }}">
            {{ $value }}
        </label>
    </div>
</div>