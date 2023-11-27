<?php

namespace App\Filament\Resources\SchoolResource\Pages;

use App\Filament\Resources\SchoolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListSchools extends ListRecords
{
    protected static string $resource = SchoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Import Schools')
                ->handleBlankRows(true)
                ->fields([
                    ImportField::make('dbn')->required(),
                    ImportField::make('name')->required(),
                    ImportField::make('type')->required(),
                    ImportField::make('school_district')->required(),
                    ImportField::make('community_district'),
                    ImportField::make('council_district'),
                    ImportField::make('census_tract'),
                    ImportField::make('address')->required(),
                    ImportField::make('longitude')->required(),
                    ImportField::make('latitude')->required(),
                ])
                ];
    }
}
