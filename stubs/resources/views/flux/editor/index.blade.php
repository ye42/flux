@props([
    'toolbar' => null,
    'invalid' => null,
    'name' => null,
])

@php
// We only want to show the name attribute on the checkbox if it has been set
// manually, but not if it has been set from the wire:model attribute...
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$invalid ??= ($name && $errors->has($name));

$classes = Flux::classes()
    ->add('block w-full')
    ->add('shadow-xs [&[disabled]]:shadow-none border rounded-lg')
    ->add('bg-white dark:bg-white/10 dark:[&[disabled]]:bg-white/[7%]')
    ->add('**:data-[slot=content]:text-base! sm:**:data-[slot=content]:text-sm!')
    ->add('**:data-[slot=content]:text-zinc-700 dark:**:data-[slot=content]:text-zinc-300')
    ->add('[&[disabled]_[data-slot=content]]:text-zinc-500 dark:[&[disabled]_[data-slot=content]]:text-zinc-400')
    ->add($invalid ? 'border-red-500' : 'border-zinc-200 border-b-zinc-300/80 dark:border-white/10')
    ;
@endphp

<flux:with-field :$attributes>
    <ui-editor {{ $attributes->class($classes) }} @if($showName) name="{{ $name }}" @endif aria-label="{{ __('Rich text editor') }}" data-flux-control data-flux-editor>
        <?php if ($slot->isEmpty()): ?>
            <flux:editor.toolbar :items="$toolbar" />

            <flux:editor.content />
        <?php else: ?>
            {{ $slot }}
        <?php endif; ?>
    </ui-editor>
</flux:with-field>

@assets
<flux:editor.scripts />
<flux:editor.styles />
@endassets
