<?php

namespace App\Filament\Resources\SaleReturnResource\Pages;

use App\Filament\Resources\SaleReturnResource;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ListSaleReturns extends ListRecords
{
    protected static string $resource = SaleReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil'),
            Actions\Action::make('Download pdf')
                ->color('info')
                ->icon('heroicon-o-book-open')
                ->action(function () {
                    $sales = Sale::where('is_returned', true)->get();
                    return response()->streamDownload(function () use ($sales) {
                        echo Pdf::loadHtml(
                            Blade::render('sales-return-pdf', ['sales' => $sales])
                        )->stream();
                    }, 'sales-return-pdf.pdf', ['Content-Type' => 'application/pdf']);
                }),

            Actions\Action::make('Export csv')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $data = DB::table('sales')->where('is_returned', true)->get();

                    $csvFileName = 'sales-return.csv';
                    $csvPath = 'public/' . $csvFileName;
                    $csvFile = fopen(storage_path('app/' . $csvPath), 'w');

                    if ($data->isNotEmpty()) {
                        $headers = array_keys((array) $data[0]);
                        fputcsv($csvFile, $headers);

                        foreach ($data as $row) {
                            fputcsv($csvFile, (array) $row);
                        }
                    }

                    fclose($csvFile);

                    return Response::download(storage_path('app/' . $csvPath), $csvFileName)->deleteFileAfterSend(true);
                }),

        ];
    }
}
