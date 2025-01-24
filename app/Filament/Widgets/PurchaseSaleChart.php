<?php

namespace App\Filament\Widgets;

use App\Models\Purchase;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PurchaseSaleChart extends ChartWidget
{
    protected static ?string $heading = 'Purchase Report';

    protected function getData(): array
    {
        $purchases = Purchase::latest('date')->take(10)->get();
        $prices = $purchases
            ->pluck('total_amount')
            ->toArray();
        $dates = $purchases
            ->pluck('date')
            ->map(fn($date) => Carbon::parse($date)->format('d M'))
            ->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Purchases',
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
