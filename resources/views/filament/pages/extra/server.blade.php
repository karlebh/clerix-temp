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
                    <div class="font-semibold">Server Software</div>
                    <div>{{ $_SERVER['SERVER_SOFTWARE'] ?? 'N/A' }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Server IP Address</div>
                    <div>{{ request()->server('SERVER_ADDR') }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Server Protocol</div>
                    <div>{{ request()->server('SERVER_PROTOCOL') }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">HTTP Host</div>
                    <div>{{ request()->getHost() }}</div>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300">
                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                    <div class="font-semibold">Server Port</div>
                    <div>{{ request()->getPort() }}</div>
                </td>
            </tr>
        </table>
    </div>
</x-filament-panels::page>
