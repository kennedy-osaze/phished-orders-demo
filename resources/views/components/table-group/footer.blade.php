@props(['previous-link', 'next-link', 'total', 'from', 'to', 'enable-previous' => true, 'enable-next' => true])

<nav class="bg-white px-4 pt-4 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
    <div class="hidden sm:block">
        <p class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $from }}</span>
            to
            <span class="font-medium">{{ $to }}</span>
            of
            <span class="font-medium">{{ $total }}</span>
            results
        </p>
    </div>
    <div class="flex-1 flex justify-between sm:justify-end">
        @if ($enablePrevious)
            <a href="{{ $previousLink }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 cursor-not-allowed" disabled>Previous</span>
        @endif

        @if ($enableNext)
            <a href="{{ $nextLink }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
        @else
            <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 cursor-not-allowed" disabled>Next</span>
        @endif
    </div>
</nav>
