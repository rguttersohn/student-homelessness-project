<?php

namespace App\Filament\Resources\StudentHousingDataResource\Pages;

use App\Filament\Resources\StudentHousingDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentHousingData extends EditRecord
{
    protected static string $resource = StudentHousingDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
