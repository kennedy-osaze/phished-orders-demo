<x-app title="View Order">
    <x-header sub-heading="See a received order...." />

    <section class="mt-5 sm:mx-auto sm:w-full sm:max-w-7xl">
        @if (session('success'))
            <x-alert type="success" class="m-5">Order has been replied to successfully</x-alert>
        @endif

        <div class="m-5 divide-y rounded-xl bg-white py-6">
            <div class="px-4 pb-4 sm:px-6 border-b border-gray-200">
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $order->subject }}</h3>
                        <div class="mt-1 text-xs text-gray-500">
                            <span>{{ $order->user->name }} [{{ $order->user->email }}]</span>
                            <span>|</span>
                            <span>Sent: {{ $order->sent_at->format("jS F Y \\a\\t h:i:s A") }}</span>
                        </div>
                    </div>
                    <div class="ml-4 mt-2 flex-shrink-0">
                        <a href="{{ route('orders.index') }}"><x-button type="button" class="relative inline-flex items-center px-4 py-2 border-transparent text-white bg-indigo-600 hover:bg-indigo-700">All Orders</x-button></a>
                    </div>
                </div>
            </div>

            <div class="whitespace-pre-line px-4 text-justify leading-relaxed text-gray-900 sm:px-6">
                <p class="text-sm">{{ $order->body }}</p>
            </div>

            <div class="px-4 py-6 sm:px-6">
                @if (is_null($order->reply))
                    <form method="post" action="{{ route('orders.reply', ['order' => $order]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <x-label for="reply" class=" text-gray-700">Reply to this order</x-label>
                        <div class="mt-1">
                            <x-textarea rows="5" name="reply" id="reply" placeholder="Your reply comes here..." maxlength="65536" required>{{ old('reply') }}</x-textarea>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <x-button type="submit" class="inline-flex items-center border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700">Send</x-button>
                        </div>
                    </form>
                @else
                    <div class="border-l-4 border-gray-300 bg-gray-50 p-4">
                        <p class="text-sm leading-relaxed">{{ $order->reply->body }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app>
