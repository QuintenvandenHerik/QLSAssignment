<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="companyIdSelector" action="#" method="GET" role="form">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="companyId">{{ __('Bedrijf ID') }}</label>
                        <input type="text" id="companyId" name="companyId" placeholder="Bedrijf ID" tabindex="1" required>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">{{ __('Verder') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
