<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

use App\Models\Timeslot;

class TimeslotsRelationManager extends RelationManager
{
    protected static string $relationship = 'timeslots';

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('timeslot_id')
                ->label('Timeslot')
                ->options(Timeslot::all()->pluck('title', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('quote')
                ->label('Quote'),
            Forms\Components\TextInput::make('start')
                ->label('Start')
                ->required(),
            Forms\Components\TextInput::make('end')
                ->label('End')
                ->required(),
            Forms\Components\TextInput::make('day')
                ->label('Day')
                ->required(),
            Forms\Components\TextInput::make('type')
                ->label('Type')
                ->required(),
        ]);
        // return $form
        //     ->schema([
        //         Forms\Components\TextInput::make('title')
        //             ->required()
        //             ->maxLength(255),
        //     ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('quote'),
                Tables\Columns\TextColumn::make('start'),
                Tables\Columns\TextColumn::make('end'),
                Tables\Columns\TextColumn::make('day'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
