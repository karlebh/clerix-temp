<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Manage Customers';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->label('First Name')
                        ->unique(ignoreRecord: true)
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->label('Last Name')
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->label('Email')
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('phone')
                        ->label('Phone')
                        ->unique(ignoreRecord: true)
                        ->nullable()
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('address_line1')
                        ->label('Address Line 1')
                        ->nullable()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('address_line2')
                        ->label('Address Line 2')
                        ->nullable()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('city')
                        ->label('City')
                        ->nullable()
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('state')
                        ->label('State')
                        ->nullable()
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('postal_code')
                        ->label('Postal Code')
                        ->nullable()
                        ->columnSpan(3),

                    Forms\Components\TextInput::make('country')
                        ->label('Country')
                        ->columnSpan(3),

                    Forms\Components\DatePicker::make('dob')
                        ->label('Date of Birth')
                        ->nullable()
                        ->columnSpan(3),

                    Forms\Components\Toggle::make('is_active')
                        ->default(true)
                        ->label('Mark User As Active')
                        ->columnSpanFull(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('address_line1')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
