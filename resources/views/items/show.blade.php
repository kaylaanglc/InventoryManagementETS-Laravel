<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Item Details' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Item Type' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $items->itemType->item_type }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Item Condition' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $items->itemCondition->item_condition }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Description' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $items->desc }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Defects (If Any)' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $items->defect }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Amount' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ $items->amount }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Image' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ isset($items->image) ? Storage::url($items->image) : '' }}" alt="{{ $items->image->image }}" srcset="">
                        </p>
                    </div>
                    <a href="{{ route('items.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
