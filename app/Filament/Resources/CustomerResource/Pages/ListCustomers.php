<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create Customer')
                ->icon('heroicon-o-pencil'),
            Actions\Action::make('Download pdf')
                ->color('info')
                ->icon('heroicon-o-book-open')
                ->action(function () {
                    $customers = Customer::all();
                    return response()->streamDownload(function () use ($customers) {
                        echo Pdf::loadHtml(
                            Blade::render('customers-pdf', ['customers' => $customers])
                        )->stream();
                    }, 'customers-pdf.pdf', ['Content-Type' => 'application/pdf']);
                }),
            Actions\Action::make('Export csv')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $data = DB::table('customers')->get();

                    $csvFileName = 'customers.csv';
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
