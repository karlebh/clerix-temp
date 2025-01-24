<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseDataEntryResource\Pages;
use App\Filament\Resources\PurchaseDataEntryResource\RelationManagers;
use App\Models\Activity;
use App\Models\DataEntryLogs\PurchaseLog;
use App\Models\Purchase;
use App\Models\PurchaseDataEntry;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseDataEntryResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationGroup = 'Data Entry Report';

    public static ?string $label = 'Purchases';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('subject_type', Purchase::class)
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
                TextColumn::make('description')
                    ->label('Action')
                    ->formatStateUsing(fn($state) => strtoupper($state))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('causer_id')
                    ->label('By')
                    ->formatStateUsing(function ($state) {
                        $role = User::find($state)->getRoleNames()->first();
                        return strtoupper($role);
                    })
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
            'index' => Pages\ListPurchaseDataEntries::route('/'),
        ];
    }
}
