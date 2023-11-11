<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Helpers\FeatureFlag;
use App\Models\BlogPost;
use App\Models\Page;
use App\Models\Product;
use App\Models\Teaser;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'h1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('SEO Informationen')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('SEO Titel')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) use ($form) {
                                if ($form->getOperation() === 'create') {
                                    $set('slug', str($state)->slug());
                                    $set('header_nav_title', str($state));
                                    $set('footer_nav_title', str($state));
                                    $set('h1', str($state));
                                }
                            })
                            ->live(onBlur: true)
                            ->required(),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('SEO Beschreibung')
                            ->nullable(),
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('parent_page_id')
                                    ->prefix('/')
                                    ->label('Übergeordnete Seite')
                                    ->options(
                                        Page::all()->whereNull('parent_page_id')
                                            ->where('locked', '=', false)
                                            ->whereNotIn('id', $form->getModelInstance()->id)
                                            ->pluck('slug', 'id'))
                                    ->nullable()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'lg' => 1,
                                    ]),
                                Forms\Components\TextInput::make('slug')
                                    ->prefix('/')
                                    ->unique(ignorable: fn ($record) => $record)
                                    ->required()
                                    ->disabled(fn (Page|null $record): ?bool => $record?->locked)
                                    ->columnSpan([
                                        'sm' => 2,
                                        'lg' => 2,
                                    ]),
                            ])->columns([
                                'sm' => 2,
                                'lg' => 3,
                            ]),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('header_nav_title')
                                    ->label('Titel im Menü')
                                    ->nullable(),
                                Forms\Components\TextInput::make('footer_nav_title')
                                    ->label('Titel in Fußzeile')
                                    ->nullable(),

                                Forms\Components\Toggle::make('header_nav_active')
                                    ->label('Sichtbar im oberen Menü')
                                    ->hintColor('white')
                                    ->hintIcon('heroicon-o-information-circle', 'Diese Seite im oberen Menü anzeigen lassen?')
                                    ->onColor('success')
                                    ->offColor('danger'),
                                Forms\Components\Toggle::make('header_footer_active')
                                    ->label('Sichtbar im unteren Menü')
                                    ->hintColor('white')
                                    ->hintIcon('heroicon-o-information-circle', 'Diese Seite im unteren Menü anzeigen lassen?')
                                    ->onColor('success')
                                    ->offColor('danger'),

                                Forms\Components\Toggle::make('online')
                                    ->label('Online?')
                                    ->hintColor('white')
                                    ->hintIcon('heroicon-o-information-circle', 'Diese Seite online sichtbar machen? (Gilt auch ohne Sichtbar im Menü oder Sichtbar in Fußzeile)')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->disabled(fn (Page|null $record): ?bool => $record?->locked),
                                Forms\Components\Toggle::make('locked')
                                    ->label('Gesperrt?')
                                    ->hintColor('white')
                                    ->hintIcon('heroicon-o-information-circle', 'Diese Seite vor wichtigen Aktionen sperren? (Option gilt nur für die Startseite. Verhindert unter anderem das Offline-Schalten)')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->disabled(),
                            ])->columns(2),
                    ]),

                Forms\Components\Section::make('Seite')
                    ->description('Bestimme was auf dieser Seite angezeigt werden soll.')
                    ->schema([
                        Forms\Components\TextInput::make('h1')
                            ->label('Überschrift')
                            ->required(),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Untertitel')
                            ->nullable(),
                        Forms\Components\Builder::make('content')
                            ->label('Seiteninhalt')
                            ->blocks([
                                Forms\Components\Builder\Block::make('heading')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Heading'))
                                            ->required(),
                                        Forms\Components\Select::make('variant')
                                            ->options([
                                                'h3' => __('H3 (Very large)'),
                                                'h4' => __('H4 (Large)'),
                                                'h5' => __('H5 (Medium)'),
                                                'h6' => __('H6 (Normal)'),
                                            ])
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('paragraph')
                                    ->schema([
                                        Forms\Components\RichEditor::make('text')
                                            ->label(__('Text block'))
                                            ->disableToolbarButtons([
                                                'attachFiles',
                                                'h2',
                                                'h3'
                                            ])
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('paragraph-with-image')
                                    ->schema([
                                        Forms\Components\Section::make(__('Text'))
                                            ->schema([
                                                Forms\Components\RichEditor::make('text')
                                                    ->label(__('Text block'))
                                                    ->disableToolbarButtons([
                                                        'attachFiles',
                                                        'h2',
                                                        'h3'
                                                    ])
                                                    ->required(),
                                            ]),
                                        Forms\Components\Section::make(__('Image'))
                                            ->schema([
                                                CuratorPicker::make('image_id')
                                                    ->multiple(false)
                                                    ->label(__('Image'))
                                                    ->required(),
                                                Forms\Components\Select::make('image_position')
                                                    ->options([
                                                        'text_left_img_right' => __('Text left, Image right'),
                                                        'img_left_text_right' => __('Image left, Text right'),
                                                    ])
                                                    ->required(),
                                            ]),
                                    ])->columns(1),
                                Forms\Components\Builder\Block::make('image')
                                    ->schema([
                                        CuratorPicker::make('image_id')
                                            ->multiple(false)
                                            ->label(__('Image'))
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('images')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Title')),
                                        CuratorPicker::make('image_ids')
                                            ->label(__('Images'))
                                            ->multiple(true)
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('teaser_group')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Title'))
                                            ->required(),
                                        Forms\Components\Builder::make('teaser_items')
                                            ->blocks([
                                                Forms\Components\Builder\Block::make('teaser_items')
                                                    ->schema([
                                                        Forms\Components\Select::make('teaser')
                                                            ->options(Teaser::all()->pluck('title', 'id'))
                                                            ->required(),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('blog-list')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Title'))
                                            ->nullable(),
                                    ]),
                                Forms\Components\Builder\Block::make('featured-blog-post')
                                    ->schema([
                                        Forms\Components\Select::make('blog_post_id')
                                            //->options(BlogPost::all()->pluck('title', 'id'))
                                            ->nullable(),
                                    ]),
                                Forms\Components\Builder\Block::make('product-list')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Title'))
                                            ->nullable(),
                                    ])->visible(FeatureFlag::isShopEnabled()),
                                Forms\Components\Builder\Block::make('product-detail')
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            //->options(Product::all()->pluck('name', 'id'))
                                            ->required(),
                                    ])->visible(FeatureFlag::isShopEnabled()),
                                Forms\Components\Builder\Block::make('form')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(__('Title'))
                                            ->nullable(),
                                        Forms\Components\Select::make('type')
                                            ->options(config('components.form_types'))
                                            ->required(),
                                        Forms\Components\TextInput::make('sender')
                                            ->label(__('Sender'))
                                            ->nullable()
                                            ->placeholder(config('mail.from.address')),
                                        Forms\Components\TextInput::make('recipient')
                                            ->label(__('Recipient'))
                                            ->nullable()
                                            ->placeholder(config('mail.to.address')),
                                    ]),
                            ])
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('h1')
                    ->searchable()
                    ->label('Überschrift')
                    ->prefix(function (Page $record, Table $table): ?Htmlable {
                        if (! static::shouldShowParent($table) && $record->parentPage) {
                            return new HtmlString('<span style="margin-inline-end: 0.75rem;">&boxur;</span>');
                        }

                        return null;
                    })
                    ->description(function (Page $record, Table $table): ?Htmlable {
                        if (static::shouldShowParent($table) && $record->parentPage) {
                            return new HtmlString('<span>Parent: ' . $record->parentPage->h1 . '</span>');
                        }

                        return null;
                    })->html(),

                Tables\Columns\TextColumn::make('slug')
                    ->formatStateUsing(fn (Page $page): string => '<a href="'.$page->link.'" target="_blank" class="text-primary-600 dark:text-primary-400 font-semibold hover:underline focus:underline">'.$page->link.'</a>')
                    ->html()
                    ->label('Link'),

                Tables\Columns\ToggleColumn::make('header_nav_active')
                    ->label('Oberes Menü')
                    ->onColor('success')
                    ->offColor('danger')
                    ->alignCenter(),

                Tables\Columns\ToggleColumn::make('footer_nav_active')
                    ->label('Unteres Menü')
                    ->onColor('success')
                    ->offColor('danger')
                    ->alignCenter(),

                Tables\Columns\ToggleColumn::make('online')
                    ->label('Online?')
                    ->onColor('success')
                    ->offColor('danger')
                    ->disabled(fn (Page $record): bool => $record->locked)
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('locked')
                    ->label('Gesperrt?')
                    ->boolean()
                    ->trueIcon('heroicon-o-lock-closed')
                    ->falseIcon('heroicon-o-lock-open')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->alignCenter(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_online')
                    ->label('Ist online')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('online', true)),

                Tables\Filters\Filter::make('is_locked')
                    ->label('Ist gesperrt')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('locked', true)),

                Tables\Filters\Filter::make('is_header_nav_active')
                    ->label('Ist im oberen Menü')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('header_nav_active', true)),

                Tables\Filters\Filter::make('is_footer_nav_active')
                    ->label('Ist im unteren Menü')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('footer_nav_active', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->hidden(fn (Page $record): bool => $record->locked),
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
                //]),
            ])->defaultSort(
                function (Builder $builder) {
                    return $builder->groupBy('parent_page_id');
                }
            );
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PageSliderItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->h1;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['h1', 'subtitle', 'slug'];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return self::getUrl('edit', ['record' => $record]);
    }

    public static function getLabel(): string
    {
        return 'Seite';
    }

    public static function getPluralLabel(): string
    {
        return 'Seiten';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Seitenverwaltung';
    }

    public static function getNavigationLabel(): string
    {
        return 'Seiten';
    }

    public static function shouldShowParent(Table $table): bool {
        $isSearching = $table->hasSearch();
        $isSorting = $table->getSortColumn();
        $hasActiveFilters = collect($table->getFilters())
            ->filter(fn (\Filament\Tables\Filters\BaseFilter $filter) => $filter->getIndicators())
            ->isNotEmpty();

        return $isSearching || $isSorting || $hasActiveFilters;
    }
}
