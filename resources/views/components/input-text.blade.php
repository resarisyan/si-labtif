@props(['disabled' => false])

<div class="form-control-wrap">
    {{ $slot }}
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control-lg']) !!}>
</div>