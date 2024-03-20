@props(['disabled' => false])
<div class="form-control-wrap">
    <textarea {{ $disabled ? 'disabled' : '' }} {!!
        $attributes->merge(['class' => 'form-control no-resize']) !!}>{{ $slot }}</textarea>
</div>