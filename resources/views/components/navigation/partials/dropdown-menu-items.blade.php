@foreach ($items as $item)
    @if (isset($item['separator']) && $item['separator'])
        <div class="bk-dropdown__separator"></div>
    @elseif ($dropdownHasChildren($item))
        <div class="bk-dropdown__submenu" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"
            @focusin="open = true" @click.away="open = false" @keydown.escape.stop="open = false">
            <button type="button" @click.prevent.stop="open = !open" :aria-expanded="open ? 'true' : 'false'"
                aria-haspopup="menu" @class([
                    'bk-dropdown__item',
                    'bk-dropdown__item--submenu-trigger',
                    'bk-dropdown__item--disabled' => !empty($item['disabled']),
                    $dropdownItemClass($item) => $dropdownItemClass($item) !== null,
                ])
                @if (!empty($item['disabled'])) aria-disabled="true" disabled @endif role="menuitem">
                <span class="bk-dropdown__item-content">
                    @if ($dropdownHasIcon($item))
                        @if ($dropdownHasCustomIconSvg($item))
                            <span class="bk-dropdown__item-icon" aria-hidden="true">{!! $dropdownCustomIconSvg($item) !!}</span>
                        @elseif ($dropdownHasCustomIconComponent($item))
                            <span class="bk-dropdown__item-icon" aria-hidden="true">
                                <x-dynamic-component :component="$dropdownCustomIconComponent($item)" class="w-full h-full" />
                            </span>
                        @elseif (!empty($item['icon']))
                            <x-dynamic-component :component="$dropdownIconComponent($item['icon'])" class="bk-dropdown__item-icon" />
                        @endif
                    @endif

                    <span>{{ $item['label'] }}</span>
                </span>

                <x-dynamic-component :component="$dropdownSubmenuToggleIcon" class="bk-dropdown__submenu-toggle-icon" ::class="{ 'rotate-180': open }" />
            </button>

            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="{{ $dropdownSubmenuClasses }}" role="menu">
                @include('basekit::components.navigation.partials.dropdown-menu-items', [
                    'items' => $dropdownChildItems($item),
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
            </div>
        </div>
    @else
        <a href="{{ $item['url'] ?? '#' }}" @class([
            'bk-dropdown__item',
            'bk-dropdown__item--disabled' => !empty($item['disabled']),
            $dropdownItemClass($item) => $dropdownItemClass($item) !== null,
        ])
            @if (!empty($item['disabled'])) aria-disabled="true" @endif role="menuitem">

            @if ($dropdownHasIcon($item))
                @if ($dropdownHasCustomIconSvg($item))
                    <span class="bk-dropdown__item-icon" aria-hidden="true">{!! $dropdownCustomIconSvg($item) !!}</span>
                @elseif ($dropdownHasCustomIconComponent($item))
                    <span class="bk-dropdown__item-icon" aria-hidden="true">
                        <x-dynamic-component :component="$dropdownCustomIconComponent($item)" class="w-full h-full" />
                    </span>
                @elseif (!empty($item['icon']))
                    <x-dynamic-component :component="$dropdownIconComponent($item['icon'])" class="bk-dropdown__item-icon" />
                @endif
            @endif

            <span>{{ $item['label'] }}</span>
        </a>
    @endif
@endforeach
