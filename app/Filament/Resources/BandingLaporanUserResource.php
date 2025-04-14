<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BandingLaporanUserResource\Pages;
use App\Filament\Resources\BandingLaporanUserResource\RelationManagers;
use App\Models\Appeal;
use App\Models\BandingLaporanUser;
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

class BandingLaporanUserResource extends Resource
{
    protected static ?string $model = Appeal::class;
    protected static ?string $navigationGroup = 'Banding User';
    protected static ?string $label = 'Banding Postingan';

    protected static ?string $navigationIcon = 'heroicon-o-stop';

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
                    ->label('Pemilik Postingan')
                    ->alignCenter(),
                ImageColumn::make('report.post.image_path')
                    ->label('Postingan terlapor')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->report->post->image_path ?? 'default.jpg'))
                    ->height(100)
                    ->width(100),
                    TextColumn::make('message')
                    ->label('Alasan Banding')
                    ->wrap()
                    ->limit(100)
                    ->tooltip(fn ($record) => $record->message)
                    ->alignCenter(), 
                    TextColumn::make('created_at')
                    ->label('Laporan Dibuat')
                    ->dateTime('d M Y') 
                    ->alignCenter(),
                            
                SelectColumn::make('status')
                    ->label('Status Banding')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ])

            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ]),
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
            'index' => Pages\ListBandingLaporanUsers::route('/'),
            'create' => Pages\CreateBandingLaporanUser::route('/create'),
            'edit' => Pages\EditBandingLaporanUser::route('/{record}/edit'),
        ];
    }
}
