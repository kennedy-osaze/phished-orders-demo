@props(['type' => 'success', 'dismissible' => 'true'])

@php
    $color = [
        'success' => ['bg' => 'bg-green-50', 'text' => 'text-green-800', 'button' => 'bg-green-50 text-green-500 hover:bg-green-100 focus:ring-offset-green-50 focus:ring-green-600'],
        'danger' => ['bg' => 'bg-red-50', 'text' => 'text-red-800', 'button' => 'bg-red-50 text-red-500 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600'],
    ][$type]
@endphp

<div {{ $attributes->class(['rounded-md p-4 mb-4 '.$color['bg']]) }} x-data="{ show: true }" x-show="show">
    <div class="flex">
        <p class="text-sm font-medium {{ $color['text'] }}">
            {{ $slot }}
        </p>

        @if ($dismissible === 'true')
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" @click="show = false"
                        class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $color['button'] }}">
                        <span class="sr-only">Dismiss</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="fill-current h-5 w-5 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
