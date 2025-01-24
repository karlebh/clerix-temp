<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class SaleWidget extends ChartWidget
{
    protected static ?string $heading = 'Sale Return Report';

    protected function getData(): array
    {
        $sale = Sale::latest('date')->take(10)->get();
        $prices = $sale
            ->pluck('total_amount')
            ->toArray();
        $dates = $sale
            ->pluck('date')
            ->map(fn($date) => Carbon::parse($date)->format('d M'))
            ->toArray();

        return
            [
                'datasets' => [
                    [
                        'label' => 'Sale Return',
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
