<?php

namespace App\Filament\Resources\EspacePedagogiqueResource\Pages;

use App\Filament\Resources\EspacePedagogiqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEspacePedagogiques extends ListRecords
{
    protected static string $resource = EspacePedagogiqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
