<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
	protected static string $resource = UserResource::class;

	protected function getHeaderActions(): array
	{
		return [
			Actions\DeleteAction::make(),
		];
	}

	protected function handleRecordUpdate(Model $record, array $data): Model
	{
		$record->name = $data['name'];
		$record->email = $data['email'];

		if ($data['password']) {
			$record->password = Hash::make($data['password']);
		}

		$record->update();

		return $record;
	}
}
