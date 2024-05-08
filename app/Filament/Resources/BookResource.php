<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
	protected static ?string $model = Book::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationGroup = 'Meta';

	public static function form(Form $form): Form
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

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('title'),
				Tables\Columns\TextColumn::make('category.name'),
				Tables\Columns\TextColumn::make('publisher.name'),
				Tables\Columns\TextColumn::make('stock')
					->numeric()
					->alignRight(),
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
			])->defaultSort('title', 'asc');
	}

	public static function getRelations(): array
	{
		return [
			RelationManagers\CheckoutsRelationManager::class,
			RelationManagers\AuthorsRelationManager::class,
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListBooks::route('/'),
			'create' => Pages\CreateBook::route('/create'),
			'edit' => Pages\EditBook::route('/{record}/edit'),
		];
	}
}
