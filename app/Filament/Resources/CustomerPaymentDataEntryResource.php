<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerPaymentDataEntryResource\Pages;
use App\Filament\Resources\CustomerPaymentDataEntryResource\RelationManagers;
use App\Models\Activity;
use App\Models\Customer;
use App\Models\CustomerPaymentDataEntry;
use App\Models\DataEntryLogs\CustomerLog;
use App\Models\DataEntryLogs\PaymentLog;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerPaymentDataEntryResource extends Resource
{
    protected static ?string $model = PaymentLog::class;

    protected static ?string $navigationGroup = 'Data Entry Report';

    public static ?string $label = 'Customer Payments';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('paymentlogable_type', Customer::class)
            ->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('trx')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('paymentlogable.name')
                    ->label('Customer Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('amount')
                    ->prefix('$')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('by')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('M d, Y h:i A')
                    ->label('Created At')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerPaymentDataEntries::route('/'),
        ];
    }
}
