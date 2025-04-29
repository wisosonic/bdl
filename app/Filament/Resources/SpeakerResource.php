<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages;
use App\Filament\Resources\SpeakerResource\RelationManagers;
use App\Models\Speaker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class SpeakerResource extends Resource
{
    protected static ?string $model = Speaker::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        $columns = Schema::getColumns((new Speaker())->getTable());
        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column["name"], ['id', 'photo', 'created_at', 'updated_at'])) {
                continue;
            }
            $field = Forms\Components\Textarea::make($column["name"]);
            if( ! $column["nullable"]) {
                $field = $field->required() ;
            }
            $tableColumns[] = $field;
        }
        $tableColumns[] = FileUpload::make('photo')
                ->label('Photo')
                ->image()
                ->directory('/img/speakers') // Optional: folder in storage
                ->disk('public')              // use the public disk
                ->imagePreviewHeight('200')
                ->maxSize(2048) // In KB (2MB here)
                ->required();   // Optional if you want to make it required
        return $form
            ->schema($tableColumns);
    }

    public static function table(Table $table): Table
    {
        $columns = Schema::getColumnListing((new Speaker())->getTable());

        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column, ['photo', 'created_at', 'updated_at'])) {
                continue;
            }
            $tableColumns[] = Tables\Columns\TextColumn::make($column)->sortable()->searchable();
        }
        $tableColumns[] = ImageColumn::make('photo')
                ->label('Photo')
                ->url(fn ($record) => asset('storage/' . $record->photo))
                ->height(50);
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
            'index' => Pages\ListSpeakers::route('/'),
            'create' => Pages\CreateSpeaker::route('/create'),
            'edit' => Pages\EditSpeaker::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
