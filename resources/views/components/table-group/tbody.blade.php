@props(['hidden' => false, 'cellSize' => null])

<div {{ $attributes->class([
    'hidden' => $hidden,
    'table-cell' => $cellSize === null,
    'lg:table-cell' => $cellSize === 'lg',
    'sm:table-cell' => $cellSize === 'sm',
    'border-b border-slate-100 p-4 text-slate-500 group-hover:text-slate-700',
]) }}>
    {{ $slot }}
</div>
