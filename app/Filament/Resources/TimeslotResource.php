<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeslotResource\Pages;
use App\Filament\Resources\TimeslotResource\RelationManagers;
use App\Models\Timeslot;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\Select;

class TimeslotResource extends Resource
{
    protected static ?string $model = Timeslot::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        $columns = Schema::getColumns((new Timeslot())->getTable());
        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column["name"], ['id', 'event_id', 'created_at', 'updated_at'])) {
                continue;
            }
            $field = Forms\Components\Textarea::make($column["name"]);
            if( ! $column["nullable"]) {
                $field = $field->required() ;
            }
            $tableColumns[] = $field;
        }
        $tableColumns[] = Select::make('event_id')
                            ->label('Event')
                            ->options(Event::all()->pluck('title', 'id')->mapWithKeys(function ($title, $id) {
                                return [
                                    $id => $id . ' - ' . $title
                                ];
                            }))
                            ->default(fn ($record) => $record ? $record->event_id : null)
                            ->required();
        return $form
            ->schema($tableColumns);
    }

    public static function table(Table $table): Table
    {
        $columns = Schema::getColumnListing((new Timeslot())->getTable());

        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column, ['created_at', 'updated_at'])) {
                continue;
            }
            $tableColumns[] = Tables\Columns\TextColumn::make($column)->sortable()->searchable();
        }

        return $table
                ->columns($tableColumns)
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
            'index' => Pages\ListTimeslots::route('/'),
            'create' => Pages\CreateTimeslot::route('/create'),
            'edit' => Pages\EditTimeslot::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
