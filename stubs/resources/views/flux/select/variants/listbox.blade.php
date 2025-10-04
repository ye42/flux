@props([
    'selectedSuffix' => null,
    'placeholder' => null,
    'searchable' => null,
    'clearable' => null,
    'invalid' => null,
    'button' => null, // Deprecated...
    'trigger' => null,
    'search' => null, // Slot forwarding...
    'empty' => null, // Slot forwarding...
    'clear' => null,
    'close' => null,
    'name' => null,
    'size' => null,
])

@php
// We only want to show the name attribute on the checkbox if it has been set
// manually, but not if it has been set from the wire:model attribute...
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$invalid ??= ($name && $errors->has($name));

$class = Flux::classes()
    ->add('w-full')
    // The below reverts styles added by Tailwind Forms plugin
    ->add('border-0 p-0 bg-transparent')
    ;

$trigger ??= $button;
@endphp

<ui-select
    clear="{{ $clear ?? 'close esc select' }}"
    @if ($close) close="{{ $close }}" @endif
    {{ $attributes->class($class)->merge(['filter' => true]) }}
    @if($showName) name="{{ $name }}" @endif
    data-flux-control
    data-flux-select
>
    <?php if ($trigger): ?> {{ $trigger }} <?php else: ?>
        <flux:select.button :$placeholder :$invalid :$size :$clearable :suffix="$selectedSuffix" />
    <?php endif; ?>

    <flux:select.options :$search :$searchable :$empty>
        {{ $slot }}
    </flux:select.options>
</ui-select>
