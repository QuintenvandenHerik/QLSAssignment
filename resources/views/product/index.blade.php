<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach ($products['data'] as $product)
                        <li class="flex mb-4"><p class="w-3/4">{{ $product['name'] }}</p><a href="/product/{{ $product['id'] }}" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4">Create Shipment</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
