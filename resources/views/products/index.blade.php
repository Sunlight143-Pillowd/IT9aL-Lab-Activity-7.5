<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div class="p-6 text-gray-900">
                        <div class="bg-green-100 text-green-800 p-3 rounded">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Add Product') }}
                    </a>
                </div>

                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class=" min-w-full border border-gray-300 border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-3 text-left">{{ __('Image') }}</th>
                                <th class="border border-gray-300 px-4 py-3 text-left">{{ __('Name') }}</th>
                                <th class="border border-gray-300 px-4 py-3 text-left">{{ __('Description') }}</th>
                                <th class="border border-gray-300 px-4 py-3 text-left">{{ __('Price') }}</th>
                                <th class="border border-gray-300 px-4 py-3 text-left">{{ __('Actions') }}</th>
                            </tr>
                        </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            class="w-20 rounded" alt="{{ $product->name }}">
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                </td>
                                <!-- Use break-words to prevent long names from stretching columns -->
                                <td class="border border-gray-300 px-4 py-3 break-words">{{ $product->name }}</td>
                                
                                <!-- Force descriptions to wrap cleanly or choose a truncation strategy below -->
                                <td class="border border-gray-300 px-4 py-3 min-w-[200px] max-w-[400px] break-words whitespace-normal">
                                    {{ $product->description }}
                                </td>
                                
                                <!-- Keep numeric prices clean and un-wrapped -->
                                <td class="border border-gray-300 px-4 py-3 whitespace-nowrap">{{ $product->price }}</td>
                                
                                <!-- Force actions to stay on a single line so buttons don't wrap weirdly -->
                                <td class="border border-gray-300 px-4 py-3 whitespace-nowrap space-x-2">
                                    <a href="{{ route('products.show', $product) }}"
                                        class="text-green-600 hover:text-green-800 underline">{{ __('View') }}</a>

                                    <a href="{{ route('products.edit', $product) }}"
                                        class="text-blue-600 hover:text-blue-800 underline">{{ __('Edit') }}</a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 underline"
                                            onclick="return confirm('Delete this product?')">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-3 text-center">
                                    {{ __('No products found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>