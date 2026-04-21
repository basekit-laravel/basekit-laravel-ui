{{-- Avatar Component --}}

{{-- Avatar Container --}}
<div {{ $attributes->twMerge($classes()) }}>
    <div class="bk-avatar__content">
        {{-- Image --}}
        @if ($hasImage())
            <img src="{{ $src }}" alt="{{ $alt }}" class="bk-avatar__image"
                @if (isset($fallback) || $initials) onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" @endif>

            {{-- Fallback on Error --}}
            @if (isset($fallback) || $hasInitials())
                <div class="bk-avatar__fallback" style="display: none;">
                    {{ $fallback ?? $initials }}
                </div>
            @endif
            {{-- Named Fallback Slot --}}
        @elseif (isset($fallback))
            <div class="bk-avatar__fallback">
                {{ $fallback }}
            </div>
            {{-- Slot or Fallback --}}
        @elseif($slot->isNotEmpty())
            {{ $slot }}
            {{-- Initials Fallback --}}
        @elseif($hasInitials())
            <div class="bk-avatar__fallback">
                {{ $initials }}
            </div>
            {{-- Default User Icon --}}
        @else
            <div class="bk-avatar__fallback">
                <svg class="bk-avatar__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        @endif
    </div>

    @if ($hasStatus())
        <span class="{{ $statusClasses() }}" aria-hidden="true"></span>
    @endif
</div>
