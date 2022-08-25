<x-app title="View Orders">
    <x-header sub-heading="See Received Orders..." />

    <section class="sm:mx-auto sm:w-full sm:max-w-7xl mt-5">
        <div class="py-8 bg-white m-5 rounded-xl">
            @if ($orders->count())
                <x-table-group>
                    <x-slot:header>
                        <x-table-group.thead class="pl-8">Name</x-table-group.thead>
                        <x-table-group.thead hidden cell-size="lg">Email</x-table-group.thead>
                        <x-table-group.thead>Subject</x-table-group.thead>
                        <x-table-group.thead hidden cell-size="sm" class="pr-8 w-32">Date</x-table-group.thead>
                    </x-slot:header>

                    @foreach ($orders->items() as $order)
                        <a href="{{ route('orders.show', ['order' => $order]) }}" class="table-row hover:bg-gray-100 group hover:text-slate-700 hover:border-l-2 hover:border-r-2 hover:border-gray-300">
                            <x-table-group.tbody class="pl-8{{ $order->opened_at ? '' : ' text-black' }}">
                                <div>{{ $order->user->name }}</div>
                                <div class="lg:hidden">{{ $order->user->email }}</div>
                            </x-table-group.tbody>
                            <x-table-group.tbody hidden cell-size="lg" class="{{ $order->opened_at ? '' : ' text-black' }}">{{ $order->user->email }}</x-table-group.tbody>
                            <x-table-group.tbody class="{{ $order->opened_at ? '' : ' text-black' }}">{{ $order->subject }}</x-table-group.tbody>
                            <x-table-group.tbody hidden cell-size="sm" class="pr-4 w-32{{ $order->opened_at ? '' : ' text-black' }}">{{ $order->sent_at->format('j M Y') }}</x-table-group.tbody>
                        </a>
                    @endforeach

                    <x-slot:footer>
                        @if ($orders->hasPages())
                            <x-table-group.footer
                                enable-previous="{{ ! $orders->onFirstPage() }}"
                                previous-link="{{ $orders->previousPageUrl() }}"
                                enable-next="{{ $orders->hasMorePages() }}"
                                next-link="{{ $orders->nextPageUrl() }}"
                                total="{{ $orders->total() }}"
                                from="{{ $orders->firstItem() }}"
                                to="{{ $orders->lastItem() }}"
                            />
                        @endif
                    </x-slot:footer>
                </x-table-group>
            @else
                <div class="text-center p-4 text-slate-700">
                    Still waiting for incoming orders to drop...
                </div>
            @endif
        </div>
    </section>
</x-app>
