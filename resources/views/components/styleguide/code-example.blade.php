@props([
    'label' => 'Blade',
])

<div class="sg-example" x-data="{ showCode: false }">
    <div class="sg-example-tabs" role="tablist">
        <button type="button" role="tab" class="sg-example-tab"
            :class="{ active: !showCode }" :aria-selected="(!showCode).toString()"
            @click="showCode = false">Preview</button>
        <button type="button" role="tab" class="sg-example-tab"
            :class="{ active: showCode }" :aria-selected="showCode.toString()"
            @click="showCode = true; setTimeout(() => { if (typeof hljs !== 'undefined') { $el.closest('.sg-example').querySelectorAll('pre code:not(.hljs)').forEach(b => hljs.highlightElement(b)); } }, 50)">Code</button>
    </div>
    <div class="sg-example-preview" role="tabpanel" x-show="!showCode" x-transition:enter="sg-fade-in">
        {{ $preview }}
    </div>
    <div class="sg-example-code" role="tabpanel" x-show="showCode" x-transition:enter="sg-fade-in" x-cloak>
        <button type="button" class="sg-copy-btn" onclick="copyCode(this)" aria-label="Copy code to clipboard">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3.5" y="3.5" width="7" height="7" rx="1"/><path d="M8.5 3.5h-5a1 1 0 00-1 1v5"/></svg>
            Copy
        </button>
        <pre><code class="language-xml">{{ trim($slot) }}</code></pre>
    </div>
</div>
