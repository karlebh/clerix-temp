<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleReturnDataEntryResource\Pages;
use App\Filament\Resources\SaleReturnDataEntryResource\RelationManagers;
use App\Models\Activity;
use App\Models\DataEntryLogs\SaleLog;
use App\Models\Sale;
use App\Models\SaleReturnDataEntry;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleReturnDataEntryResource extends Resource
{
    protected static ?string $model = SaleLog::class;

    protected static ?string $navigationGroup = 'Data Entry Report';

    public static ?string $label = 'Sale Returns';

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
                    ->label('Action')
                    ->formatStateUsing(fn($state) => strtoupper($state))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('by')
                    ->label('By')
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
            'index' => Pages\ListSaleReturnDataEntries::route('/'),
            'edit' => Pages\EditSaleReturnDataEntry::route('/{record}/edit'),
        ];
    }
}
