<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use App\Models\Report;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Notifications\Notification;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->form([
                    Forms\Components\Select::make('type')
                        ->options(['bug' => 'bug', 'feature' => 'feature'])
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->options([
                            'submitted' => 'Submitted',
                            'in-progress' => 'In Progress',
                            'under-review' => 'Under Review',
                            'staging' => 'Staging',
                            'closed' => 'Closed',
                        ]),
                    Forms\Components\RichEditor::make('message')
                        ->required(),
                ])
                ->action(function (array $data) {
                    $data = array_map(fn($value) => strip_tags($value), $data);
                    Report::create($data);

                    Notification::make()
                        ->title('Report Created')
                        ->success()
                        ->body('The report has been successfully created.')
                        ->send();
                }),
        ];
    }
}
