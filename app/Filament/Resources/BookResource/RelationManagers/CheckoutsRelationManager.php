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
			->schema([
				Forms\Components\Select::make('member_id')
					->label('Member')
					->relationship('member', 'name')
					->searchable(),
				Forms\Components\DatePicker::make('start_date')
					->label('Start Date')
					->default(now()),
				Forms\Components\DatePicker::make('end_date')
					->label('End Date')
					->default(now()),
				Forms\Components\Checkbox::make('returned')
					->default(false)
					->columnSpanFull(),
			]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('id')
			->columns([
				Tables\Columns\TextColumn::make('member.name'),
				Tables\Columns\TextColumn::make('start_date')
					->label('Start Date')
					->date(),
				Tables\Columns\TextColumn::make('end_date')
					->label('End Date')
					->date(),
				Tables\Columns\CheckboxColumn::make('returned')->alignCenter(),
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
			])->defaultSort('id', 'desc');
	}
}
