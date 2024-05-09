<?php

namespace App\Filament\Resources\BookResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckoutsRelationManager extends RelationManager
{
	protected static string $relationship = 'checkouts';

	public function form(Form $form): Form
	{
		return $form
			->schema([]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('id')
			->columns([
				Tables\Columns\TextColumn::make('member.name'),
				Tables\Columns\TextColumn::make('due_date')->label('Due Date')->date(),
				Tables\Columns\TextColumn::make('return_date')->label('Return Date')->date(),
			])
			->filters([])
			->headerActions([])
			->actions([
				Tables\Actions\DetachAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])->defaultSort('id', 'desc');
	}
}
