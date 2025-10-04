@aware([ 'placeholder' ])

@props([
    'placeholder' => null,
    'clearable' => null,
    'invalid' => false,
    'suffix' => null,
    'size' => null,
    'max' => null,
])

@php
$classes = Flux::classes()
    ->add('group/listbox-button cursor-default')
    ->add('overflow-hidden') // Overflow hidden is here to prevent the button from growing when selected text is too long.
    ->add('flex items-center')
    ->add('shadow-xs')
    ->add('bg-white dark:bg-white/10 dark:disabled:bg-white/[7%]')
    // Make the placeholder match the text color of standard input placeholders...
    ->add('disabled:shadow-none')
    ->add(match($size) {
        default => 'min-h-10 text-base sm:text-sm rounded-lg ps-[calc(0.5rem-1px)] pe-3 py-[calc(0.5rem-1px)] block w-full',
        'sm' => 'min-h-6 text-sm rounded-md ps-[calc(0.25rem)] pe-2 py-[calc(0.25rem)] block w-full',
    })
    ->add($invalid
        ? 'border border-red-500'
        : 'border border-zinc-200 border-b-zinc-300/80 dark:border-white/10'
    )
    ;
@endphp

<ui-pillbox-trigger {{ $attributes->class($classes) }} @if ($invalid) data-invalid @endif data-flux-group-target data-flux-pillbox-trigger>
    <?php if ($slot->isNotEmpty()): ?>
        {{ $slot }}
    <?php else: ?>
        <flux:pillbox.selected :$placeholder :$max :$suffix :$size />
    <?php endif; ?>

    <?php if ($clearable): ?>
        <flux:button as="div"
            class="self-start cursor-pointer -my-1 ms-2 -me-2 [[data-flux-pillbox-trigger]:has([data-flux-pillbox-placeholder])_&]:hidden [[data-flux-pillbox][disabled]:has([data-selected])_&]:hidden"
            variant="subtle"
            :size="$size === 'sm' ? 'xs' : 'sm'"
            square
            tabindex="-1"
            aria-label="Clear selected"
            x-on:click.prevent.stop="let select = $el.closest('ui-pillbox'); select.value = select.hasAttribute('multiple') ? [] : null; select.dispatchEvent(new Event('change', { bubbles: false })); select.dispatchEvent(new Event('input', { bubbles: false }))"
        >
            <flux:icon.x-mark variant="micro" />
        </flux:button>
    <?php endif; ?>

    <flux:icon.chevron-down variant="mini" class="self-start {{ $size === 'sm' ? 'mt-0.25' : 'mt-0.5' }} ms-2 -me-1 text-zinc-300 [[data-flux-pillbox-trigger]:hover_&]:text-zinc-800 [[disabled]_&]:text-zinc-200! dark:text-white/60 dark:[[data-flux-pillbox-trigger]:hover_&]:text-white dark:[[disabled]_&]:text-white/40!" />
</ui-pillbox-trigger>