@props(['url', 'iconClass'])
<li class="nk-menu-item">
    <a href="{{ $url }}" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="{{ $iconClass }}"></em></span>
        <span class="nk-menu-text">{{ $slot }}</span>
    </a>
</li>