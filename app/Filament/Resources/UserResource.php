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
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\ActionsColumn;
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['friendships.friend', 'inverseFriendships.user', 'posts']);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('phone_number')->label('Nomor HP'),
                TextColumn::make('total_friends')
                    ->label('Jumlah Pertemanan')
                    ->getStateUsing(fn($record) => $record->totalFriends()->count())
                    ->alignCenter(),
                ViewColumn::make('friendships')
                    ->label('Berteman')
                    ->view('filament.tables.columns.friendship-list'),
                ViewColumn::make('posts')
                    ->label('Postingan')
                    ->view('filament.tables.columns.user-photo-list')
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
                    ->getStateUsing(fn($record) => $record->avatar ? asset('storage/users-avatar/' . $record->avatar) : asset('storage/users-avatar/avatar.png')),

                // ActionsColumn::make('actions')
                //     ->label('Aksi')
                //     ->actions([
                //         Tables\Actions\EditAction::make()->label('Ubah'),
                //         Tables\Actions\DeleteAction::make()->label('Hapus'),
                //         Tables\Actions\ViewAction::make()->label('Lihat'),
                //     ])
                //     ->alignCenter(),
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
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    // Menambahkan bulk action lainnya, jika perlu
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
