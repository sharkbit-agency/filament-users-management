<?php

namespace sharkBitAgency\FilamentUsersManagement\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use sharkBitAgency\FilamentUsersManagement\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static function getNavigationGroup(): ?string
    {
        return config('filament-users-management.navigation_group');
    }

    protected static function getNavigationLabel(): string
    {
        return trans('filament-users-management::user.resource.label.plural');
    }

    protected function getTitle(): string
    {
        return trans('filament-users-management::user.resource.title.resource');
    }

    public static function getLabel(): string
    {
        return trans('filament-users-management::user.resource.label.single');
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-users-management::user.resource.label.plural');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-users-management.navigation_sort');
    }

    public static function getSlug(): string
    {
        return (string)config('filament-users-management.slug') ?? "users";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label(trans('filament-users-management::user.resource.name')),
                TextInput::make('email')
                    ->email()
                    ->unique(table: User::class, ignorable: fn(?User $record): ?User => $record)
                    ->required()
                    ->label(trans('filament-users-management::user.resource.email')),
                TextInput::make('password')->label(trans('filament-users-management::user.resource.password'))
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : ""),
                Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->label(trans('filament-users-management::user.resource.roles')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label(trans('filament-users-management::user.resource.id')),
                TextColumn::make('name')->sortable()->searchable()->label(trans('filament-users-management::user.resource.name')),
                TextColumn::make('email')->sortable()->searchable()->label(trans('filament-users-management::user.resource.email')),
                TagsColumn::make('roles.name')->label(trans('filament-users-management::user.resource.roles')),
                TextColumn::make('created_at')->label(trans('filament-users-management::user.resource.created_at'))->dateTime('M j, Y')->sortable(),
                TextColumn::make('updated_at')->label(trans('filament-users-management::user.resource.updated_at'))->dateTime('M j, Y')->sortable(),
            ])
            ->prependActions([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
