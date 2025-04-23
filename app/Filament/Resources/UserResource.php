<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User';
    protected static ?int $navigationSort = 110;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->required()
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),

                TextInput::make('phone_number')
                    ->label('Nomor HP')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                FileUpload::make('avatar')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('users-avatar')
                    ->disk('public')
                    ->imagePreviewHeight('100')
                    ->loadingIndicatorPosition('left')
                    ->uploadButtonPosition('right')
                    ->removeUploadedFileButtonPosition('right')
                    ->hint('Ukuran max: 2MB'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('phone_number')->label('phone_number'),
                TextColumn::make('friendships')
                    ->label('Pertemanan')
                    ->getStateUsing(function ($record) {
                        return \App\Models\Friendship::where('status', 'approved')
                            ->where(function ($query) use ($record) {
                                $query->where('user_id', $record->id)
                                    ->orWhere('friend_id', $record->id);
                            })
                            ->count();
                    })
                    ->alignCenter(),
                TextColumn::make('total_likes')
                    ->label('Disenangi')
                    ->getStateUsing(fn($record) => $record->totalLikes()->count())
                    ->alignCenter(),

                TextColumn::make('jumlah_postingan')
                    ->label('Jumlah Postingan')
                    ->getStateUsing(fn($record) => $record->postFoto()->count())
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label('Tanggal Registrasi')
                    ->alignCenter(),
                ImageColumn::make('avatar')
                    ->label('Gambar Profil')
                    ->height(80)
                    ->width(80)
                    ->getStateUsing(
                        fn($record) =>
                        $record->avatar ? asset('storage/users-avatar/' . $record->avatar) : asset('storage/users-avatar/avatar.png')
                    )
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->default(null)
                    ->placeholder('Semua'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
