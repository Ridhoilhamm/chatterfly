<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostinganResource\Pages;
use App\Filament\Resources\PostinganResource\RelationManagers;
use App\Models\post_foto;
use App\Models\Postingan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostinganResource extends Resource
{
    protected static ?string $model = post_foto::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Postingan';
    protected static ?string $label = 'Postingan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path')
                    ->label('Gambar')
                    ->directory('uploads')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->required(),

                TextInput::make('caption')
                    ->label('Caption')
                    ->required()
                    ->maxLength(255),

                Select::make('user_id')
                    ->label('Diposting Oleh')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Toggle::make('is_arsip')
                    ->label('Arsip')
                    ->inline(false)
                    ->onColor('success')
                    ->offColor('gray')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->image_path))
                    ->height(100)
                    ->width(100)
                    ->alignCenter(),

                TextColumn::make('user.name')
                    ->label('Diposting Oleh')
                    ->alignCenter(),
                TextColumn::make('caption')
                    ->label('Caption')
                    ->alignCenter(),
                TextColumn::make('likes_count')
                    ->label('Jumlah Like')
                    ->getStateUsing(fn($record) => $record->likes()->count())
                    ->alignCenter(),
                ToggleColumn::make('is_arsip')
                    ->label('Arsip')
                    ->onColor('success')
                    ->offColor('gray')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('is_arsip')
                    ->label('Filter Arsip')
                    ->options([
                        true => 'Diarsipkan',
                        false => 'Tidak Diarsipkan',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPostingans::route('/'),
            'create' => Pages\CreatePostingan::route('/create'),
            'edit' => Pages\EditPostingan::route('/{record}/edit'),
        ];
    }
}
