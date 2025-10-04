@pure

@props([
    'kbd' => '⌘I',
])

<flux:tooltip content="{{ __('Italic') }}" :$kbd class="contents">
    <flux:editor.button data-editor="italic">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" aria-hidden="true"> <path fill-rule="evenodd" d="M8 2.75A.75.75 0 0 1 8.75 2h7.5a.75.75 0 0 1 0 1.5h-3.215l-4.483 13h2.698a.75.75 0 0 1 0 1.5h-7.5a.75.75 0 0 1 0-1.5h3.215l4.483-13H8.75A.75.75 0 0 1 8 2.75Z" clip-rule="evenodd" /> </svg>
    </flux:editor.button>
</flux:tooltip>
