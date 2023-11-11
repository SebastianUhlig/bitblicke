<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderItemResource\Pages;
use App\Filament\Resources\SliderItemResource\RelationManagers;
use App\Models\SliderItem;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderItemResource extends Resource
{
    protected static ?string $model = SliderItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('Slider Content'))
                    ->description(__('Here are all the parts that are visible to the readers.'))
                    ->schema([
                        Forms\Components\TextInput::make('title')->required(),
                        Forms\Components\Textarea::make('text')->nullable(),
                        Forms\Components\TextInput::make('btn_label')->nullable(),
                        Forms\Components\TextInput::make('btn_link')->nullable(),

                        CuratorPicker::make('image')
                            ->multiple(false)
                            ->label(__('Image')),

                        Forms\Components\Toggle::make('online')
                            ->onColor('success')
                            ->offColor('danger'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->translateLabel(),
                Tables\Columns\ToggleColumn::make('online')
                    ->translateLabel()
                    ->onColor('success')->offColor('danger')
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliderItems::route('/'),
            'create' => Pages\CreateSliderItem::route('/create'),
            'edit' => Pages\EditSliderItem::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return 'Slider';
    }

    public static function getPluralLabel(): string
    {
        return 'Sliders';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Seitenverwaltung';
    }

    public static function getNavigationLabel(): string
    {
        return 'Sliders';
    }
}
