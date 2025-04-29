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

use App\Filament\Resources\UserResource;
use App\Models\User;
use App\Models\Event;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form->schema([
            
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('lunch')->label('Attending Lunch')->boolean(),
                Tables\Columns\IconColumn::make('presence')
                    ->boolean(),
                Tables\Columns\IconColumn::make('certificate')
                    ->getStateUsing(fn ($record) => $record->certificate ?? 'na') 
                    ->label('Certificate')
                    ->icon(fn (string $state): string => match ($state) {
                        'na' => 'heroicon-o-clock',
                        default => 'heroicon-o-check-badge',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'na' => 'gray',
                        default => 'success',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(2)
                    ->form(UserResource::getFormSchema()), // creates a new User and attaches it
                Tables\Actions\AttachAction::make()
                    ->form(fn (RelationManager $livewire) => [
                        Forms\Components\Select::make('recordId')
                            ->label('User')
                            ->options(User::whereDoesntHave('events', function($query) use ($livewire) {
                                $query->where('event_id', $livewire->getOwnerrecord()->id);
                            })->get()->pluck('name', 'id'))
                            ->required(),
                        Forms\Components\Radio::make('lunch')
                            ->label('Attending Lunch ?')
                            ->boolean()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(0)
                            ->required(),
                        Forms\Components\Radio::make('presence')
                            ->label('Presence ?')
                            ->boolean()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(0)
                            ->required(),
                        Forms\Components\FileUpload::make('certificate')
                            ->label('Certificate')
                            ->directory('/uploads/certificates')
                            ->disk('public')
                            ->maxSize(2048)
                            ->previewable(false), // pivot field
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(fn (RelationManager $livewire) => [
                        Forms\Components\Hidden::make('recordId'),
                        Forms\Components\Radio::make('lunch')
                            ->label('Attending Lunch ?')
                            ->boolean()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(0)
                            ->required(),
                        Forms\Components\Radio::make('presence')
                            ->label('Presence ?')
                            ->boolean()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(0)
                            ->required(),
                        Forms\Components\FileUpload::make('certificate')
                            ->label('Certificate')
                            ->directory('/uploads/certificates')
                            ->disk('public')
                            ->maxSize(2048)
                            ->previewable(false), // pivot field
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
