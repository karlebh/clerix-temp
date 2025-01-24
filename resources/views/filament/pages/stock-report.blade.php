<x-filament-panels::page>


    <x-filament-panels::form>
        {{ $this->form }}
    </x-filament-panels::form>

    <div>
        <x-filament::button wire:click="create">
            Get Report
        </x-filament::button>
    </div>

    @if (!empty($tableData) && $dataSourceType === 'product')
        <div class="overflow-x-auto">
            @if (count($tableData) > 0)
                <table class="min-w-full w-full border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-200">
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                ID
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Name
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Current Stock
                            </th>
                        </tr>
                    </thead>
            @endif
            <tbody>
                @forelse ($tableData as $warehouse)
                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            {{ $warehouse['id'] }}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            {{ $warehouse['name'] }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            {{ $warehouse['stock'] }}</td>
                    </tr>
                @empty
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full text-center">
                        <h1 class="text-3xl font-semibold mb-4">Stock Report Not Found</h1>
                        <p class="text-lg mb-6">We couldn't find any stock reports matching your search.</p>
                    </div>
                @endforelse
            </tbody>
            </table>
        </div>

    @endif

    @if (!empty($tableData) && $dataSourceType === 'warehouse')
        <div class="overflow-x-auto">
            @if (count($tableData) > 0)
                <table class="min-w-full w-full border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-200">
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                ID
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Name
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Category
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Price
                            </th>
                            <th
                                class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-left text-gray-700 dark:text-gray-300">
                                Stock
                            </th>
                        </tr>
                    </thead>
            @endif
            <tbody>
                @forelse ($tableData as $item)
                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $item['id'] }}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $item['name'] }}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            {{ $item['category']->name }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $item['price'] }}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $item['stock'] }}
                        </td>
                    </tr>
                @empty
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full text-center">
                        <h1 class="text-3xl font-semibold mb-4">Stock Report Not Found</h1>
                        <p class="text-lg mb-6">We couldn't find any stock reports matching your search.</p>
                    </div>
                @endforelse
            </tbody>
            </table>
        </div>
    @endif


    <x-filament-actions::modals />

</x-filament-panels::page>
