{{-- Skeleton Component --}}
{{--
    Props:
    - variant: 'default', 'circle', 'text' (default: from config)
    - size: 'xs', 'sm', 'md', 'lg', 'xl' (default: from config)
    - width: string (CSS width value, optional)
    - height: string (CSS height value, optional)
    - lines: int (number of skeleton lines for text variant, default: 1)
--}}

{{-- Skeleton Rendering --}}
@if ($isMultiline())
    <div {{ $attributes->except('rounded')->twMerge('bk-skeleton__text-group') }}>
        @for ($i = 0; $i < $lines; $i++)
            <div class="{{ $classes() }}" @if ($lineStyle($i)) style="{{ $lineStyle($i) }}" @endif>
            </div>
        @endfor
    </div>
@else
    <div {{ $attributes->except('rounded')->twMerge($classes()) }}
        @if ($singleStyle()) style="{{ $singleStyle() }}" @endif>
    </div>
@endif
