<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Get;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'General';

    public static function getFormSchema(): array
    {
        $columns = Schema::getColumns((new User())->getTable());
        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column["name"], ['id', 'location', 'doctor', 'lda_id', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'])) {
                continue;
            }
            $field = Forms\Components\TextInput::make($column["name"]);
            if( ! $column["nullable"]) {
                $field = $field->required() ;
            }
            $tableColumns[] = $field;
        }

        $tableColumns[] = Forms\Components\Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable();
        
        $tableColumns[] = Forms\Components\Radio::make('location')
                    ->label('Location')
                    ->options(['1' => "Beirut", '0' => 'Other'])
                    ->inline()
                    ->inlineLabel(false)
                    ->default(1)
                    ->required();

        $tableColumns[] = Forms\Components\Radio::make('doctor')
                    ->label('Doctor')
                    ->options(['1' => "Doctor", '0' => 'Student'])
                    ->inline()
                    ->inlineLabel(false)
                    ->default(1)
                    ->live()
                    ->required();
        $tableColumns[] = Forms\Components\TextInput::make('lda_id')
                    ->label('LDA ID')
                    ->visible(fn (Get $get): bool => $get('doctor'))
                    ->requiredIf('doctor', '1');

        return [
            Forms\Components\Grid::make(2)
                ->schema($tableColumns)
        ];
    }

    public static function form(Form $form): Form
    {
        return $form->schema(self::getFormSchema())->columns(2);
    }

    public static function table(Table $table): Table
    {
        $columns = Schema::getColumnListing((new User())->getTable());

        $tableColumns = [];
        foreach ($columns as $column) {
            if (in_array($column, ['email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'])) {
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
            RelationManagers\EventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function afterSave(Form $form, Model $record): void
    {
        $record->syncRoles($form->getState()['roles'] ?? []);
    }
}
