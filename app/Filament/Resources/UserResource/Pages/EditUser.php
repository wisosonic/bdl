<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('changePassword')
                ->label('Change Password')
                ->form([                        
                    Forms\Components\TextInput::make('new_password')
                        ->label('New Password')
                        ->password()
                        ->required()
                        ->minLength(8),
                    Forms\Components\TextInput::make('new_password_confirmation')
                        ->label('Confirm New Password')
                        ->password()
                        ->same('new_password')
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $user = $this->record;

                    // Update password
                    $user->update([
                        'password' => Hash::make($data['new_password']),
                    ]);

                    Notification::make()
                        ->title('Password updated successfully.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Change User Password'),
        ];
    }
}
