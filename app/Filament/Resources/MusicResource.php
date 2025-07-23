<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MusicResource\Pages;
use App\Filament\Resources\MusicResource\RelationManagers;
use App\Models\Music;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Album; // n'oublie pas !

class MusicResource extends Resource
{
    protected static ?string $model = Music::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('artist')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('album_id') // 🔥
                ->label('Album')
                ->relationship('album', 'title')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\FileUpload::make('file_path')
                ->label('Fichier MP3')
                ->directory('musics')
                ->acceptedFileTypes(['audio/mpeg', 'audio/mp3'])
                ->required(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('cover_image')
                ->label('Cover')
                ->getStateUsing(fn ($record) => $record->cover_image ? asset($record->cover_image) : null)
                ->circular()
                ->size(60),
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('artist')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('album.title') // 🔥 via relation
                ->label('Album')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Ajouté le')
                ->dateTime()
                ->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListMusic::route('/'),
            'create' => Pages\CreateMusic::route('/create'),
            'edit' => Pages\EditMusic::route('/{record}/edit'),
        ];
    }
}
