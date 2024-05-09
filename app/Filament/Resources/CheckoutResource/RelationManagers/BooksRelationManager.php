<?php

namespace App\Filament\Resources\CheckoutResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BooksRelationManager extends RelationManager
{
	protected static string $relationship = 'books';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('title')
					->required()
					->maxLength(255),
			]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('title')
			->columns([
				Tables\Columns\TextColumn::make('title')->searchable(),
				Tables\Columns\TextColumn::make('category.name'),
				Tables\Columns\TextColumn::make('publisher.name'),
			])
			->filters([
			])
			->headerActions([
				Tables\Actions\AttachAction::make(),
			])
			->actions([
				Tables\Actions\DetachAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])->defaultSort('title', 'asc');
	}
}
