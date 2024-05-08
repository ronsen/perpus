<?php

namespace App\Filament\Resources\AuthorResource\RelationManagers;

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
				Forms\Components\Select::make('category_id')
					->label('Category')
					->relationship('category', 'name'),
				Forms\Components\Select::make('publisher_id')
					->label('Publisher')
					->relationship('category', 'name')
					->searchable(),
				Forms\Components\TextInput::make('title')->required(),
				Forms\Components\TextInput::make('stock')
					->numeric()
					->default(0)
					->required(),
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
				Tables\Columns\TextColumn::make('stock')
					->numeric()
					->alignRight(),
			])
			->filters([
				//
			])
			->headerActions([
				Tables\Actions\CreateAction::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])->defaultSort('title', 'asc');
	}
}
