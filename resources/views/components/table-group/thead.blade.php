@props(['hidden' => false, 'cellSize' => null])

<div {{ $attributes->class([
    'hidden' => $hidden,
    'table-cell' => $cellSize === null,
    'sm:table-cell' => $cellSize === 'sm',
    'lg:table-cell' => $cellSize === 'lg',
    'border-b font-medium p-4 pt-0 pb-3 text-left text-xs uppercase tracking-wide text-gray-500',
]) }}>
    {{ $slot }}
</div>
