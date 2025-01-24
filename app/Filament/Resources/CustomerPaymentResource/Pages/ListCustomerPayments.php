<?php

namespace App\Filament\Resources\CustomerPaymentResource\Pages;

use App\Filament\Resources\CustomerPaymentResource;
use App\Models\Customer;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ListCustomerPayments extends ListRecords
{
    protected static string $resource = CustomerPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Payment')
                ->icon('heroicon-o-pencil'),
            Actions\Action::make('Download pdf')
                ->color('info')
                ->icon('heroicon-o-book-open')
                ->action(function () {
                    $payments = Payment::where('paymentable_type', Customer::class)->get();
                    return response()->streamDownload(function () use ($payments) {
                        echo Pdf::loadHtml(
                            Blade::render('payments-pdf', ['payments' => $payments])
                        )->stream();
                    }, 'customer-payments-pdf.pdf', ['Content-Type' => 'application/pdf']);
                }),
            Actions\Action::make('Export csv')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $data = DB::table('payments')->where('paymentable_type', Customer::class)->get();

                    $csvFileName = 'customer-payments.csv';
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
