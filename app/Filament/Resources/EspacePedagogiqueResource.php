<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspacePedagogiqueResource\Pages;
use App\Filament\Resources\EspacePedagogiqueResource\RelationManagers;
use App\Models\Espace;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspacePedagogiqueResource extends Resource
{
    protected static ?string $model = Espace::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de l\'Espace Pédagogique')
                    ->schema([
                        Forms\Components\Select::make('matiere_id')
                            ->relationship('matiere', 'libelle')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('promotion_id')
                            ->relationship('promotion', 'libelle')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('formateur_id')
                            ->relationship('formateur', 'nom')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->prenom} {$record->nom}")
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])->columns(2),
            ]);
    }

        public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('matiere.libelle')
                    ->label('Matière')
                    ->sortable()
                    ->searchable()
                    ->color('secondary'),
                    
                Tables\Columns\TextColumn::make('formateur.prenom')
                    ->label('Prénom Formateur')
                    ->color('secondary'),
                    
                Tables\Columns\TextColumn::make('formateur.nom')
                    ->label('Nom Formateur')
                    ->searchable()
                    ->color('secondary'),
                    
                Tables\Columns\TextColumn::make('promotion.libelle')
                    ->label('Promotion')
                    ->badge() // Affiche la promotion dans une petite bulle stylisée
                    ->color('warning'),
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
            'index' => Pages\ListEspacePedagogiques::route('/'),
            'create' => Pages\CreateEspacePedagogique::route('/create'),
            'edit' => Pages\EditEspacePedagogique::route('/{record}/edit'),
        ];
    }
}
