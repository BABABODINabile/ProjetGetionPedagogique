<?php

namespace App\Filament\Resources\EspacePedagogiqueResource\Pages;

use App\Filament\Resources\EspacePedagogiqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEspacePedagogique extends EditRecord
{
    protected static string $resource = EspacePedagogiqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
