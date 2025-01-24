<?php

namespace App\Filament\Widgets;

use App\Models\Purchase;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PurchasePurchaseReturn extends ChartWidget
{
    protected static ?string $heading = 'Purchase Return Report';

    protected function getData(): array
    {
        $sale = Purchase::where('is_returned', 'true')->latest('date')->take(10)->get();
        $prices = $sale
            ->pluck('total_amount')
            ->toArray();
        $dates = $sale
            ->pluck('date')
            ->map(fn($date) => Carbon::parse($date)->format('d M'))
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Purchases Return',
                    'data' => $prices,
                ],
            ],
            'labels' => $dates,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
