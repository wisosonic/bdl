<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
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

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        $columns = Schema::getColumns((new Event())->getTable());
        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column["name"], ['id', 'registering', 'cover', 'created_at', 'updated_at'])) {
                continue;
            }
            $field = Forms\Components\Textarea::make($column["name"]);
            if( ! $column["nullable"]) {
                $field = $field->required() ;
            }
            $tableColumns[] = $field;
        }
        $tableColumns[] = Forms\Components\Radio::make('registering')
                            ->label('Registering ?')
                            ->boolean()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(0)
                            ->required();
        $tableColumns[] = FileUpload::make('cover')
                ->label('Cover')
                ->image()
                ->directory('/img/backgrounds') // Optional: folder in storage
                ->disk('public')              // use the public disk
                ->imagePreviewHeight('200')
                ->maxSize(2048) // In KB (2MB here)
                ->required();   // Optional if you want to make it required
        return $form
            ->schema($tableColumns);
    }

    public static function table(Table $table): Table
    {
        $columns = Schema::getColumnListing((new Event())->getTable());

        $tableColumns = [];
        $tableColumns[] = ImageColumn::make('cover')
                ->label('Cover')
                ->url(fn ($record) => asset('storage/' . $record->cover))
                ->height(50);
        foreach ($columns as $column) {
            if (in_array($column, ['cover', 'created_at', 'updated_at'])) {
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
            RelationManagers\SponsorsRelationManager::class,
            RelationManagers\TimeslotsRelationManager::class,
            RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
