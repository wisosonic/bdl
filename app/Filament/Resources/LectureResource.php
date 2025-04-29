<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LectureResource\Pages;
use App\Filament\Resources\LectureResource\RelationManagers;
use App\Models\Lecture;
use App\Models\Speaker;
use App\Models\Timeslot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\Select;

class LectureResource extends Resource
{
    protected static ?string $model = Lecture::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        $columns = Schema::getColumns((new Lecture())->getTable());
        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column["name"], ['id', 'timeslot_id', 'speaker_id', 'created_at', 'updated_at'])) {
                continue;
            }
            $field = Forms\Components\Textarea::make($column["name"]);
            if( ! $column["nullable"]) {
                $field = $field->required() ;
            }
            $tableColumns[] = $field;
        }
        $tableColumns[] = Select::make('timeslot_id')
                            ->label('Timeslot')
                            ->options(Timeslot::all()->pluck('title', 'id')->mapWithKeys(function ($title, $id) {
                                return [
                                    $id => $id . ' - ' . $title
                                ];
                            }))
                            ->default(fn ($record) => $record ? $record->timeslot_id : null)
                            ->required();
        $tableColumns[] = Select::make('speaker_id')
                            ->label('Speaker')
                            ->options(Speaker::all()->pluck('name', 'id')->mapWithKeys(function ($name, $id) {
                                return [
                                    $id => $id . ' - ' . $name
                                ];
                            }))
                            ->default(fn ($record) => $record ? $record->speaker_id : null)
                            ->required();
        return $form
            ->schema($tableColumns);
    }

    public static function table(Table $table): Table
    {
        $columns = Schema::getColumnListing((new Lecture())->getTable());

        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column, ['timeslot_id', 'speaker_id', 'created_at', 'updated_at'])) {
                continue;
            }
            $tableColumns[] = Tables\Columns\TextColumn::make($column)->sortable()->searchable();
        }
        $tableColumns[] = Tables\Columns\TextColumn::make("speaker.name")->sortable()->searchable();

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
            'index' => Pages\ListLectures::route('/'),
            'create' => Pages\CreateLecture::route('/create'),
            'edit' => Pages\EditLecture::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
