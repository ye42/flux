@pure

@props([
    'kbd' => null,
])

<flux:tooltip content="{{ __('Highlight') }}" :$kbd class="contents">
    <flux:editor.button data-editor="highlight">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 11-6 6v3h9l3-3"/><path d="m22 12-4.6 4.6a2 2 0 0 1-2.8 0l-5.2-5.2a2 2 0 0 1 0-2.8L14 4"/></svg>
    </flux:editor.button>
</flux:tooltip>
