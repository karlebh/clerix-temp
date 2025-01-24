<x-filament-panels::page>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 dark:border-gray-700">
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Compiled views will be cleared
                    </div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Application cache will be cleared
                    </div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Route cache will be cleared
                    </div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Configuration cache will be cleared
                    </div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Compiled services and packages files will be removed
                    </div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Caches will be cleared
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <x-filament::button wire:click="clearCache">
        Clear Cache
    </x-filament::button>

</x-filament-panels::page>
