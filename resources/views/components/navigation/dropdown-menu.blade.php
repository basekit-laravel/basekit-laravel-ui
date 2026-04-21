{{-- Dropdown Menu Component --}}
{{--
    Props:
    - position: string ('bottom-left', 'bottom-right', 'top-left', 'top-right')
    - trigger: string ('click', 'hover')
    - items: array (menu item arrays with optional `icon`, `iconComponent`, `iconSvg`)

    Slots:
    - trigger: Custom trigger markup
    - beforeMenu: Custom markup rendered before items/default content
    - afterMenu: Custom markup rendered after items/default content
    - default: Custom menu markup
--}}

<div class="bk-dropdown" x-data="{ open: false }" @click.away="open = false"
    @if ($openOn === 'hover') @mouseenter="open = true" @mouseleave="open = false" @endif {{ $attributes }}>

    {{-- Trigger --}}
    @if ($openOn === 'click')
        <div @click="open = !open">
        @else
            <div>
    @endif
    @if (isset($trigger))
        {{ $trigger }}
    @else
        <button type="button" class="bk-dropdown__trigger">
            <span>Menu</span>
            <x-dynamic-component :component="$triggerIconComponent()" class="bk-dropdown__trigger-icon" ::class="{ 'rotate-180': open }" />
        </button>
    @endif
</div>

{{-- Dropdown Menu --}}
<div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    class="{{ $classes() }}" role="menu">

    @if (isset($beforeMenu) && !$beforeMenu->isEmpty())
        {{ $beforeMenu }}
    @endif

    @if (!$slot->isEmpty())
        {{ $slot }}
    @elseif (!empty($items))
        @php
            $dropdownHasChildren = fn(array $item): bool => $hasChildren($item);
            $dropdownChildItems = fn(array $item): array => $childItems($item);
            $dropdownItemClass = fn(array $item): ?string => $itemClass($item);
            $dropdownHasIcon = fn(array $item): bool => $hasIcon($item);
            $dropdownHasCustomIconSvg = fn(array $item): bool => $hasCustomIconSvg($item);
            $dropdownCustomIconSvg = fn(array $item): ?\Illuminate\Support\HtmlString => $customIconSvg($item);
            $dropdownHasCustomIconComponent = fn(array $item): bool => $hasCustomIconComponent($item);
            $dropdownCustomIconComponent = fn(array $item): ?string => $customIconComponent($item);
            $dropdownIconComponent = fn(?string $icon): ?string => $iconComponent($icon);
            $dropdownSubmenuClasses = $submenuClasses();
            $dropdownSubmenuToggleIcon = $submenuToggleIconComponent();
        @endphp
        @include('basekit::components.navigation.partials.dropdown-menu-items', [
            'items' => $items,
            'dropdownHasChildren' => $dropdownHasChildren,
            'dropdownChildItems' => $dropdownChildItems,
            'dropdownItemClass' => $dropdownItemClass,
            'dropdownHasIcon' => $dropdownHasIcon,
            'dropdownHasCustomIconSvg' => $dropdownHasCustomIconSvg,
            'dropdownCustomIconSvg' => $dropdownCustomIconSvg,
            'dropdownHasCustomIconComponent' => $dropdownHasCustomIconComponent,
            'dropdownCustomIconComponent' => $dropdownCustomIconComponent,
            'dropdownIconComponent' => $dropdownIconComponent,
            'dropdownSubmenuClasses' => $dropdownSubmenuClasses,
            'dropdownSubmenuToggleIcon' => $dropdownSubmenuToggleIcon,
        ])
    @endif

    @if (isset($afterMenu) && !$afterMenu->isEmpty())
        {{ $afterMenu }}
    @endif
</div>
</div>
