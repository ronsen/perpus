<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
	protected static ?string $model = Member::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationGroup = 'Meta';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->required(),
				Forms\Components\TextInput::make('address'),
				Forms\Components\TextInput::make('email')->email(),
				Forms\Components\TextInput::make('phone_number')->label('Phone Number'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name'),
				Tables\Columns\TextColumn::make('address'),
				Tables\Columns\TextColumn::make('email'),
				Tables\Columns\TextColumn::make('phone_number')->label('Phone Number'),
			])
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
			])->defaultSort('name', 'asc');
	}

	public static function getRelations(): array
	{
		return [
			RelationManagers\CheckoutsRelationManager::class,
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListMembers::route('/'),
			'create' => Pages\CreateMember::route('/create'),
			'edit' => Pages\EditMember::route('/{record}/edit'),
		];
	}
}
