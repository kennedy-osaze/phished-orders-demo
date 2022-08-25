@props(['header', 'footer'])

<div class="table border-collapse table-auto w-full text-sm">
    <div class="table-header-group">
        <div class="table-row">
            {{ $header }}
        </div>
    </div>

    <div class="table-row-group bg-white">
        {{ $slot }}
    </div>
</div>

{{ $footer }}
