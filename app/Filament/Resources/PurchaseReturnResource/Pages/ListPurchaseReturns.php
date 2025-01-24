<?php

namespace App\Filament\Resources\PurchaseReturnResource\Pages;

use App\Filament\Resources\PurchaseReturnResource;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ListPurchaseReturns extends ListRecords
{
    protected static string $resource = PurchaseReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create Purchase Return')
                ->icon('heroicon-o-pencil'),
            Actions\Action::make('Download pdf')
                ->color('info')
                ->icon('heroicon-o-book-open')
                ->action(function () {
                    $purchases = Purchase::where('is_returned', true)->get();
                    return response()->streamDownload(function () use ($purchases) {
                        echo Pdf::loadHtml(
                            Blade::render('purchases-returned-pdf', ['purchases' => $purchases])
                        )->stream();
                    }, 'purchases-returned-pdf.pdf', ['Content-Type' => 'application/pdf']);
                }),
            Actions\Action::make('Export csv')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $data = DB::table('purchases')->where('is_returned', true)->get();

                    $csvFileName = 'purchase-return.csv';
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
