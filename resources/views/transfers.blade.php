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
        <p class="text-sm font-semibold">Transfers Report</p>
        <p class="text-xs text-gray-700">Generated on: <span class="font-medium">{{ now()->format('l, F j, Y') }}</span>
        </p>
    </div>
</div>


<table class="min-w-full table-auto border-collapse shadow-md rounded-lg overflow-hidden">
    <thead class="">
        <tr>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Invoice Number</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Date</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">From</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Destination</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Products</th>
            <th class="px-6 py-3 text-left font-medium uppercase text-sm">Time Created</th>
        </tr>
    </thead>
    <tbody class="text-gray-600">
        @forelse ($purchases as $purchase)
            <tr class="">
                <td class="px-6 py-4 border-t">{{ $purchase->invoice_number }}</td>
                <td class="px-6 py-4 border-t">{{ \Carbon\Carbon::parse($purchase->date)->format('M d, Y') }}</td>
                <td class="px-6 py-4 border-t">{{ $purchase->from_location }}</td>
                <td class="px-6 py-4 border-t">{{ $purchase->to_location }}</td>
                <td class="px-6 py-4 border-t">{{ $purchase->product_count }}</td>
                <td class="px-6 py-4 border-t">{{ $purchase->created_at->format('M d, Y') }}</td>
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
