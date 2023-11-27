<?php

namespace App\Filament\Resources\StudentHousingDataResource\Pages;

use App\Filament\Resources\StudentHousingDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;
use Illuminate\Support\Facades\DB;

class ListStudentHousingData extends ListRecords
{
    protected static string $resource = StudentHousingDataResource::class;
    

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Import Student Data')
                ->handleBlankRows(true)
                ->fields([
                    ImportField::make('school_id')
                        ->label('School DBN')
                        ->mutateBeforeCreate(function($value){
                            
                            $school = DB::table('schools')
                                ->select('id')
                                ->where('dbn', '=', $value)
                                ->first();

                            if($school?->id):
                                return $school->id;
                            else:
                                return $value;
                            endif;
                                
                        })
                        ->required(),
                ImportField::make('school_year')->required(),
                ImportField::make('total')->required(),
                ImportField::make('in_temporary_housing_number')->required(),
                ImportField::make('in_temporary_housing_percent')->required(),
                ImportField::make('in_shelter')->required(),
                ImportField::make('in_shelter_dhs')->required(),
                ImportField::make('in_shelter_non_dhs')->required(),
                ImportField::make('doubled_up')->required(),

                ])
        ];
    }
}
