<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseReturnDataEntryResource\Pages;
use App\Filament\Resources\PurchaseReturnDataEntryResource\RelationManagers;
use App\Models\DataEntryLogs\PurchaseLog;
use App\Models\Purchase;
use App\Models\PurchaseReturnDataEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseReturnDataEntryResource extends Resource
{
    protected static ?string $model = PurchaseLog::class;

    protected static ?string $navigationGroup = 'Data Entry Report';

    public static ?string $label = 'Purchase Returns';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('is_returned', true)
            ->latest();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->sortable()
                    ->formatStateUsing(fn($state) => strtoupper($state))
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
            'index' => Pages\ListPurchaseReturnDataEntries::route('/'),
            'create' => Pages\CreatePurchaseReturnDataEntry::route('/create'),
            'edit' => Pages\EditPurchaseReturnDataEntry::route('/{record}/edit'),
        ];
    }
}
