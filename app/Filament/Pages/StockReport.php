<?php

namespace App\Filament\Pages;

use App\Models\Product;
use App\Models\Warehouse;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Concerns\InteractsWithTable;

class StockReport extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';

    protected static string $view = 'filament.pages.stock-report';

    public static $label = 'Stock Reports';

    public $submittedData = [];
    public ?array $data = [];
    public $tableData = [];
    public $dataSourceType;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)
                    ->schema([
                        Forms\Components\Select::make('filter')
                            ->label('Filter By (Please choose a way to show the stock report)')
                            ->required()
                            ->options([
                                'product' => 'Product',
                                'warehouse' => 'Warehouse',
                            ])
                            ->afterStateUpdated(function ($state, Set $set) {
                                $set('showWarehouseField', $state === 'warehouse');
                                $set('showProductField', $state === 'product');
                            })
                            ->live()
                            ->columnSpan(3),

                        Forms\Components\Select::make('warehouse')
                            ->label('Warehouse')
                            ->required()
                            ->visible(
                                fn(Get $get) => $get('showWarehouseField')
                            )
                            ->options(Warehouse::all()->pluck('name', 'id'))
                            ->columnSpan(3),

                        Forms\Components\Select::make('product')
                            ->label('Product')
                            ->required()
                            ->visible(
                                fn(Get $get) => $get('showProductField')
                            )
                            ->options(Product::all()->pluck('name', 'id'))
                            ->columnSpan(3),
                    ]),
            ])
            ->statePath('data');
    }



    // public function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\Select::make('filter')
    //                 ->label('Filter By (Please choose a way to show the stock report)')
    //                 ->required()
    //                 ->options([
    //                     'product' => 'Product',
    //                     'warehouse' => 'Warehouse'
    //                 ])
    //                 ->afterStateUpdated(function ($state, Set $set) {
    //                     $set('showWarehouseField', $state === 'warehouse');
    //                     $set('showProductField', $state === 'product');
    //                 })
    //                 ->live()
    //                 ->columnSpan(6),

    //             Forms\Components\Select::make('warehouse')
    //                 ->required()
    //                 ->visible(
    //                     fn(Get $get) => $get('showWarehouseField')
    //                 )
    //                 ->options(Warehouse::all()->pluck('name', 'id')),

    //             Forms\Components\Select::make('product')
    //                 ->required()
    //                 ->visible(
    //                     fn(Get $get) => $get('showProductField')
    //                 )
    //                 ->options(Product::all()->pluck('name', 'id')),
    //         ])
    //         ->statePath('data');
    // }

    public function create(): void
    {
        $data = $this->form->getState();

        if ($data['filter'] === 'warehouse') {
            $this->tableData = Warehouse::find($data['warehouse'])->products;
            $this->dataSourceType = 'warehouse';
        } else {
            $this->tableData = Product::find($data['product'])->warehouses;
            $this->dataSourceType = 'product';
        }
    }
}
