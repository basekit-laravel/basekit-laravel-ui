<div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end; gap: 0.5rem; margin-bottom: 1rem;">
    <button type="button" style="font-size: 0.75rem; font-weight: 500; color: var(--sg-text-secondary); background: var(--sg-surface-secondary, #f8fafc); border: 1px solid var(--sg-border, #e2e8f0); cursor: pointer; padding: 0.25rem 0.75rem; border-radius: 0.375rem; transition: all 0.1s;"
        @click="expandAll()"
        onmouseover="this.style.borderColor='var(--sg-primary, #4f46e5)'; this.style.color='var(--sg-primary, #4f46e5)'"
        onmouseout="this.style.borderColor='var(--sg-border, #e2e8f0)'; this.style.color='var(--sg-text-secondary)'">
        Expand all
    </button>
    <button type="button" style="font-size: 0.75rem; font-weight: 500; color: var(--sg-text-muted, #94a3b8); background: none; border: 1px solid transparent; cursor: pointer; padding: 0.25rem 0.75rem; border-radius: 0.375rem; transition: all 0.1s;"
        @click="collapseAll()"
        onmouseover="this.style.color='var(--sg-text-secondary)'; this.style.borderColor='var(--sg-border)'"
        onmouseout="this.style.color='var(--sg-text-muted)'; this.style.borderColor='transparent'">
        Collapse all
    </button>
</div>
