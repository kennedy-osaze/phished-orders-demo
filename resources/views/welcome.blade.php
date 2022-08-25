<x-app title="Home">
    <x-header sub-heading="Place your order here..." class="!sm:max-w-md" />

    <main class="mt-8 sm:w-full sm:mx-auto sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-xl ring-1 ring-gray-900/5 sm:rounded-lg sm:px-10">
            <form method="post" action="{{ route('orders.create') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if ($errors->any())
                    <x-alert type="danger">{{ $errors->first() }}</x-alert>
                @elseif (session('success'))
                    <x-alert type="success">Your order has been sent successfully</x-alert>
                @endif

                <div class="text-gray-700 divide-y divide-gray-200 space-y-6">
                    <div class="space-y-6">
                        <div class="space-y-1">
                            <x-label for="name">Name</x-label>
                            <x-input name="name" id="name" type="text" placeholder="John Doe" minlength="3" maxlength="100" value="{{ old('name') }}" required/>
                        </div>

                        <div class="space-y-1">
                            <x-label for="email">Email</x-label>
                            <x-input name="email" id="email" type="email" placeholder="john.doe@example.com" maxlength="255" value="{{ old('email') }}" required/>
                        </div>

                        <div class="space-y-1">
                            <x-label for="subject">Subject</x-label>
                            <x-input name="subject" id="subject" type="text" placeholder="Order for a Pizza" minlength="3" maxlength="255" value="{{ old('subject') }}" required/>
                        </div>

                        <div class="space-y-1">
                            <x-label for="body">Order Details</x-label>
                            <x-textarea rows="6" name="body" id="body" placeholder="Add details of your order..." maxlength="65536" required>{{ old('body') }}</x-textarea>
                        </div>
                    </div>

                    <div class="pt-5 flex justify-end">
                        <x-button type="reset" class="bg-white py-2 px-4 border-gray-300 text-gray-700 hover:bg-gray-50">
                            Clear
                        </x-button>

                        <x-button type="submit" class="ml-3 inline-flex justify-center bg-indigo-600 py-2 px-4 border-transparent text-white hover:bg-indigo-700">
                            Submit Order
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center mt-5">
            <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500 hover:underline" href="{{ route('orders.index') }}">See the list of all orders</a>
        </div>
    </main>
</x-app>
