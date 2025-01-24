<style>
    /* Header Styling */
    .header {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .title {
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #3B82F6;
        letter-spacing: 0.05rem;
    }

    .subtitle {
        font-size: 0.875rem;
        font-weight: 300;
        color: #4B5563;
    }

    /* Report Info Styling */
    .report-info {
        text-align: right;
        font-weight: bold;
        margin-top: 0.5rem;
    }

    .report-title {
        font-size: 0.875rem;
        font-weight: 600;
    }

    .report-date {
        font-size: 0.75rem;
        color: #4B5563;
    }

    .report-date span {
        font-weight: 500;
    }

    /* Report Content Styling */
    .report-content {
        background-color: #DCFCE7;
        padding: 2.5rem;
        border-radius: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #1F2937;
        margin-top: 1.5rem;
    }

    /* Footer Styling */
    .footer {
        background-color: #1F2937;
        color: #FFFFFF;
        text-align: center;
        padding: 1rem;
        margin-top: 2rem;
        font-size: 0.875rem;
    }

    /* Utility Styles */
    .text-blue-500 {
        color: #3B82F6;
    }

    .text-gray-700 {
        color: #4B5563;
    }
</style>


<div>
    <div class="header flex items-center space-x-4">
        <div>
            <h1 class="title">Clerix-Temp</h1>
            <p class="subtitle">The next-gen admin panel solution</p>
        </div>
    </div>
    <div class="report-info text-right">
        <p class="report-title">Sales Report</p>
        <p class="report-date">Generated on: <span>{{ now()->format('l, F j, Y') }}</span></p>
    </div>
</div>

<div class="report-content">
    <div>Number: {{ $record->invoice_number }}</div>
    <div>Customer: {{ $record->customer->name }}</div>
    <div>Warehouse: {{ $record->warehouse->name }}</div>
    <div>Total price: ${{ $record->total_amount }}</div>
    <div>Order Date: {{ $record->created_at->format('l, F j, Y') }}</div>
</div>

<footer class="footer">
    <p>Thank you.</p>
    <p>Clerix Temp</p>
</footer>
