<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                            class="w-52 rounded mb-4" alt="{{ $product->name }}">
                    @endif

                    <p class="mb-2"><strong>{{ __('Name:') }}</strong> {{ $product->name }}</p>
                    <p class="mb-2"><strong>{{ __('Description:') }}</strong> {{ $product->description }}</p>
                    <p class="mb-2"><strong>{{ __('Price:') }}</strong> {{ $product->price }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.index') }}"
                        class="text-blue-600 hover:text-blue-800 underline">
                        {{ __('Back to List') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>