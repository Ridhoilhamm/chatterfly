<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FriendshipResource\Pages;
use App\Filament\Resources\FriendshipResource\RelationManagers;
use App\Models\Friendship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FriendshipResource extends Resource
{
    protected static ?string $model = Friendship::class;


    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Pertemanan';
    protected static ?string $label = 'Pertemanan';
    protected static ?string $navigationGroup = 'User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
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
            'index' => Pages\ListFriendships::route('/'),
            'create' => Pages\CreateFriendship::route('/create'),
            'edit' => Pages\EditFriendship::route('/{record}/edit'),
        ];
    }
}
