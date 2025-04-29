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
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\EditAction;

use App\Filament\Resources\SponsorResource;
use App\Models\Sponsor;
use App\Models\Event;

class SponsorsRelationManager extends RelationManager
{
    protected static string $relationship = 'sponsors';

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('sponsor_id')
                ->label('Sponsor')
                ->options(Sponsor::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('platinum')
                ->label('Platinum')
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('platinum'),
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->url(fn ($record) => asset('storage/' . $record->photo))
                    ->height(50),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(2)
                    ->form(SponsorResource::getFormSchema()), // creates a new User and attaches it
                Tables\Actions\AttachAction::make()
                    ->form(fn (RelationManager $livewire) => [
                        Forms\Components\Select::make('recordId')
                            ->label('Sponsor')
                            ->options(Sponsor::whereDoesntHave('events', function($query) use ($livewire) {
                                    $query->where('event_id', $livewire->getOwnerrecord()->id);
                                })->get()->pluck('name', 'id'))
                            ->required(),
                        Forms\Components\TextInput::make('platinum')
                            ->label('Platinum')
                            ->numeric()
                            ->required(),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(fn (RelationManager $livewire) => [
                        Forms\Components\Hidden::make('recordId'),
                        Forms\Components\TextInput::make('platinum')
                            ->label('Platinum')
                            ->numeric()
                            ->required(),
                    ]),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
