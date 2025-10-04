@pure

@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

@php
$classes = Flux::classes()
    // NOTE: We need to add relative positioning here to prevent odd overflow behaviors because of
    // "sr-only": https://github.com/tailwindlabs/tailwindcss/discussions/12429
    ->add('@container relative')
    ;
@endphp

<flux:with-field :$attributes :$name>
    <ui-file-upload
        {{ $attributes->class($classes) }}
        @if($name) name="{{ $name }}" @endif
        data-flux-file-upload
    >
        <input type="file" wire:ignore data-slot="receiver" class="sr-only" @if($name) name="{{ $name }}" @endif />

        {{ $slot }}
    </ui-file-upload>
</flux:with-field>
