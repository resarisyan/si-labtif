@props(['disabled' => false])

<div class="form-control-wrap ">
    <div class="form-control-select">
        <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control-lg'])
            !!}>
            {{ $slot }}
        </select>
    </div>
</div>