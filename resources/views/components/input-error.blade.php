@props(['messages', 'version' => '1'])

@if ($version == '1')
<div {{ $attributes->merge(['class' => 'mt-2 error_text text-danger']) }}></div>
@elseif ($version == '2')
@if ($messages)
<ul {{ $attributes->merge(['class' => 'text-sm text-danger space-y-1']) }}>
    @foreach ((array) $messages as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
@endif
@endif