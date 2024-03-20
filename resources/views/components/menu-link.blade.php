@props(['url', 'iconClass', 'hasSub' => false])
<li {!! $attributes->merge(['class' => 'nk-menu-item']) !!}>
    @if ($hasSub)
    {{ $slot }}
    @else
    <a href="{{ $url }}" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="{{ $iconClass }}"></em></span>
        <span class="nk-menu-text">{{ $slot }}</span>
    </a>
    @endif
</li>