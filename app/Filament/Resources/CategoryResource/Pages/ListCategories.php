<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Notifications\Notification;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->form([
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\RichEditor::make('description'),
                    ]),
                ])->action(function (array $data) {
                    $data = array_map(fn($value) => strip_tags($value), $data);
                    Category::create($data);

                    Notification::make()
                        ->title('Success')
                        ->body('Category has been successfully created.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
