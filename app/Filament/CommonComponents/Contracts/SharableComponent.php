<?php

namespace App\Filament\CommonComponents\Contracts;

interface SharableComponent
{
    public static function form(): array;

    public static function table(): array;
}
