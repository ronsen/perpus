<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckoutResource\Pages;
use App\Filament\Resources\CheckoutResource\RelationManagers;
use App\Models\Checkout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckoutResource extends Resource
{
	protected static ?string $model = Checkout::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Select::make('member_id')
					->label('Member')
					->relationship('member', 'name')
					->searchable()
					->required(),
				Forms\Components\DatePicker::make('due_date')
					->label('Due Date')
					->default(now()->addWeek())
					->required(),
				Forms\Components\DatePicker::make('return_date')
					->label('Return Date'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('member.name')->label('Member'),
				Tables\Columns\TextColumn::make('due_date')->label('Due Date')->date(),
				Tables\Columns\TextColumn::make('return_date')->label('Return Date')->date(),
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
			])->defaultSort('id', 'desc');
	}

	public static function getRelations(): array
	{
		return [
			RelationManagers\BooksRelationManager::class,
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListCheckouts::route('/'),
			'create' => Pages\CreateCheckout::route('/create'),
			'edit' => Pages\EditCheckout::route('/{record}/edit'),
		];
	}
}
