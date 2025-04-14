<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanPostinganVideoResource\Pages;
use App\Filament\Resources\LaporanPostinganVideoResource\RelationManagers;
use App\Models\LaporanPostinganVideo;
use App\Models\LaporanVideo;
use App\Models\post_video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanPostinganVideoResource extends Resource
{
    protected static ?string $model = LaporanVideo::class;
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $label = 'Laporan Postingan Video';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

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
                // viewColumn::make('post.video_path')
                // ->label('Gambar Dilaporkan')
                // ->getStateUsing(fn($record) => asset('storage/' . $record->post->video_path))
                // ->height(80)
                // ->width(80),

                SelectColumn::make('status')
                ->label('Status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Disetujui',
                    'rejected' => 'Ditolak',
                    ])
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('created_at')
                        ->label('Laporan Dibuat')
        ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLaporanPostinganVideos::route('/'),
            'create' => Pages\CreateLaporanPostinganVideo::route('/create'),
            'edit' => Pages\EditLaporanPostinganVideo::route('/{record}/edit'),
        ];
    }
}
