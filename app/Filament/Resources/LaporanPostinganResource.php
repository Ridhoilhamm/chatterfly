<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanPostinganResource\Pages;
use App\Filament\Resources\LaporanPostinganResource\RelationManagers;
use App\Models\Laporan;
use App\Models\LaporanPostingan;
use App\Models\post_foto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanPostinganResource extends Resource
{
    protected static ?string $model = Laporan::class;
    protected static ?string $label = 'Laporan Postingan Foto';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?int $navigationSort = 90;

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
                TextColumn::make('user.name')
                    ->label('Pelapor'),

                ImageColumn::make('post.image_path')
                    ->label('Gambar Dilaporkan')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->post->image_path))
                    ->height(80)
                    ->width(80),

                TextColumn::make('reason')
                    ->label('Alasan'),
                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ])
                    ->sortable()
                    ->searchable()


            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ]),
            ])
            
            ->actions([
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
            'index' => Pages\ListLaporanPostingans::route('/'),
            'create' => Pages\CreateLaporanPostingan::route('/create'),
            'edit' => Pages\EditLaporanPostingan::route('/{record}/edit'),
        ];
    }
}
