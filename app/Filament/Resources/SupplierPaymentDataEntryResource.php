<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierPaymentDataEntryResource\Pages;
use App\Filament\Resources\SupplierPaymentDataEntryResource\RelationManagers;
use App\Models\DataEntryLogs\PaymentLog;
use App\Models\DataEntryLogs\SupplierLog;
use App\Models\Supplier;
use App\Models\SupplierPaymentDataEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierPaymentDataEntryResource extends Resource
{
    protected static ?string $model = PaymentLog::class;

    protected static ?string $navigationGroup = 'Data Entry Report';

    public static ?string $label = 'Suppliers Payment';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('paymentlogable_type', Supplier::class)
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
                    ->label('Supplier Name')
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
            'index' => Pages\ListSupplierPaymentDataEntries::route('/'),
        ];
    }
}
