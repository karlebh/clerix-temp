<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerPaymentResource\Pages;
use App\Filament\Resources\CustomerPaymentResource\RelationManagers;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CustomerPaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationGroup = 'Payment Report';

    public static ?string $label = 'Customer Payments';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('paymentable_type', Customer::class)
            ->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->label('Date')
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->label('Amount')
                    ->numeric()
                    ->required(),

                MorphToSelect::make('paymentable')
                    ->label("Payer")
                    ->columnSpanFull()
                    ->required()
                    ->types([
                        MorphToSelect\Type::make(Customer::class)
                            ->titleAttribute('first_name'),
                    ])
                    ->searchable()
                    ->preload()
                    ->disabledOn('edit'),

                Forms\Components\RichEditor::make('reason')
                    ->label('Reason')
                    ->columnSpanFull()
                    ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('Invoice Number')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->sortable()
                    ->date(),

                Tables\Columns\TextColumn::make('paymentable.name')
                    ->label("Payer")
                    ->searchable(),

                Tables\Columns\TextColumn::make('trx')
                    ->label('Transaction ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('reason')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->label('Reason')
                    ->wrap()
                    ->limit(50),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->money('usd'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListCustomerPayments::route('/'),
            'create' => Pages\CreateCustomerPayment::route('/create'),
            'edit' => Pages\EditCustomerPayment::route('/{record}/edit'),
        ];
    }
}
