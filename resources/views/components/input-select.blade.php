@props(['disabled' => false])

<div class="form-control-wrap ">
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control-lg'])
        !!}>
        {{ $slot }}
    </select>
</div>