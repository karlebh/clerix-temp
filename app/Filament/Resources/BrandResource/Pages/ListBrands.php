<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Resources\BrandResource;
use App\Models\Brand;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Notifications\Notification;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon(
                    'heroicon-o-pencil'
                )->form([
                    Forms\Components\Grid::make(1)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required(),
                            Forms\Components\RichEditor::make('description')
                        ]),
                ])->action(function (array $data) {
                    $data = array_map(fn($value) => strip_tags($value), $data);
                    Brand::create($data);

                    Notification::make()
                        ->title('Success')
                        ->body('Brand has been successfully created.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
