<x-filament-panels::page>


    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 dark:border-gray-700">
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">PHP Version</div>
                    <div>{{ phpversion() }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Laravel</div>
                    <div>{{ app()->version() }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Filament Version</div>
                    <div>{{ \Composer\InstalledVersions::getVersion('filament/filament') }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Time Zone</div>
                    <div>{{ config('app.timezone') }}</div>
                </td>
            </tr>
        </table>
    </div>




</x-filament-panels::page>
