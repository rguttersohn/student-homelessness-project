<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentHousingDataResource\Pages;
use App\Filament\Resources\StudentHousingDataResource\RelationManagers;
use App\Models\StudentHousingData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class StudentHousingDataResource extends Resource
{
    protected static ?string $model = StudentHousingData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Student Housing Data";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::mak('school_id')->relationship('school', 'name'),
                TextInput::make('school_year')->numeric()->required(),
                TextInput::make('total')->numeric()->required(),
                TextInput::make('in_temporary_housing_number')->numeric()->required(),
                TextInput::make('in_temporary_housing_percent')->numeric()->required()->inputMode('decimal'),
                TextInput::make('in_shelter')->numeric()->numeric()->required(),
                TextInput::make('in_shelter_dhs')->numeric()->required(),
                TextInput::make('in_shelter_non_dhs')->numeric()->required(),
                TextInput::make('doubled_up')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('school.name'),
                TextColumn::make('school_year')->label('Year'),
                TextColumn::make('total'),
                TextColumn::make('in_temporary_housing_number')->label('Temp Housing #'),
                TextColumn::make('in_temporary_housing_percent')->label('Temp Housing %'),
                TextColumn::make('in_shelter')->label('In Shelter Total'),
                TextColumn::make('in_shelter_dhs')->label('In DHS Shelter'),
                TextColumn::make('in_shelter_non_dhs')->label('In non-DHS Shelter'),
                TextColumn::make('doubled_up'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListStudentHousingData::route('/'),
            'create' => Pages\CreateStudentHousingData::route('/create'),
            'edit' => Pages\EditStudentHousingData::route('/{record}/edit'),
        ];
    }
}
