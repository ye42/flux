@pure

@props([
    'tooltip' => null,
    'summary' => null,
    'value' => null,
    'svg' => null,
])

@php
$classes = Flux::classes('block [:where(&)]:relative');

$value = is_array($value) ? \Illuminate\Support\Js::encode($value) : $value;
@endphp

<ui-chart {{ $attributes->class($classes) }} wire:ignore.children @if ($value) value="{{ $value }}" @endif>
    {{ $slot }}
</ui-chart>
