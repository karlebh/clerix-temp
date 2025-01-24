<style>
    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .space-x-4 {
        gap: 1rem;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .font-bold {
        font-weight: bold;
    }

    .tracking-wide {
        letter-spacing: 0.025em;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .text-blue-500 {
        color: #2563eb;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .font-light {
        font-weight: 300;
    }

    .text-gray-200 {
        color: #9ca3af;
    }

    .bg-gray-700 {
        background-color: #374151;
    }

    .text-right {
        text-align: right;
    }

    .space-y-1 {
        gap: 0.25rem;
    }

    .font-semibold {
        font-weight: 600;
    }

    .min-w-full {
        min-width: 100%;
    }

    .table-auto {
        table-layout: auto;
    }

    .border-collapse {
        border-collapse: collapse;
    }

    .shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .py-3 {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }

    .text-left {
        text-align: left;
    }

    .text-gray-600 {
        color: #718096;
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .border-t {
        border-top: 1px solid #e2e8f0;
    }

    footer {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
</style>


<div>
    <div class="flex items-center space-x-4">
        <div>
            <h1 class="text-2xl font-bold tracking-wide uppercase text-blue-500">Clerix-Temp</h1>
            <p class="text-sm font-light text-gray-700">The next-gen admin panel solution</p>
        </div>
    </div>
    <div class="text-right space-y-1 font-bold">
        <p class="text-sm font-semibold">Sales Report</p>
        <p class="text-xs text-gray-700">Generated on: <span class="font-medium">{{ now()->format('l, F j, Y') }}</span>
        </p>
    </div>
</div>


<table class="min-w-full table-auto border-collapse shadow-md rounded-lg overflow-hidden">
    <thead class="">
        <tr>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Invoice Number</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Customer</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Warehouse</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Amount</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Paid?</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Time Created</th>
        </tr>
    </thead>
    <tbody class="text-gray-600">
        @forelse ($sales as $sale)
            <tr class="">
                <td class="px-6 py-4 border-t">{{ $sale->invoice_number }}</td>
                <td class="px-6 py-4 border-t">{{ $sale->customer->name }}</td>
                <td class="px-6 py-4 border-t">{{ $sale->warehouse->name }}</td>
                <td class="px-6 py-4 border-t">${{ number_format($sale->total_ampount, 2) }}</td>
                <td class="px-6 py-4 border-t">{{ $sale->is_paid ? 'Yes' : 'No' }}</td>
                <td class="px-6 py-4 border-t">{{ $sale->created_at->format('Y-m-d') }}</td>
            </tr>
        @empty
            <tr>
                <td>Records not available.</td>
            </tr>
        @endforelse
    </tbody>
</table>


<footer class="bg-gray-800 text-white text-center py-4">
    <p>Thank you.</p>
    <p>Clerix Temp</p>
</footer>
